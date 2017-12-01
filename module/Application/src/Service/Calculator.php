<?php

namespace Application\Service;

use Application\Entity\Account;
use Application\Entity\History;

class Calculator
{
    /**
     * Entity manager.
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function calculatePercent()
    {
        //Получаем счета месячной давности
        $monthOldAccounts = $this->entityManager->getRepository(Account::class)->getMonthOldAccounts();

        //Просто сегодняшняя дата
        $today = date("Y-m-d");

        //Делаем запись в историю и начисляем проценты
        foreach ($monthOldAccounts as $monthOldAccount) {
            $history = new History();
            $account = new Account();
            $sum = $monthOldAccount->getBalance() / 100 * $monthOldAccount->getPercent();

            $history->setAccount($monthOldAccount);
            $history->setDate($today);
            $history->setOperationType('percent');
            $history->setSum($sum);

            $this->entityManager->persist($history);

            $account->setId($monthOldAccount->getId());
            $account->setClient($monthOldAccount->getClient());
            $account->setAccountType($monthOldAccount->getAccountType());
            $account->setAccountCurrency($monthOldAccount->getAccountCurrency());
            $account->setDateCreate($monthOldAccount->getDateCreate());
            $account->setAccountNumber($monthOldAccount->getAccountNumber());
            $account->setSum($monthOldAccount->getSum());
            $account->setPercent($monthOldAccount->getPercent());
            $account->setBalance($monthOldAccount->getBalance() + $sum);
            $this->entityManager->merge($account);

            $this->entityManager->flush();
        }
    }

    public function calculateCommission()
    {
        //Получаем все счета
        $accounts = $this->entityManager->getRepository(Account::class)->findAll();

        //Просто сегодняшняя дата
        $today = date("Y-m-d");

        //Делаем запись в историю и списываем коммиссию
        foreach ($accounts as $account)
        {
            $balance = $account->getBalance();
            $created = $account->getDateCreate();
            $prevMonth = strftime('%m', strtotime('first day of previous month'));

            //Вычисляем размер коммиссии за месяц
            if($balance < 10000)
            {
                if($balance >= 1000)
                {
                    $commission_sum = $balance * 0.06;
                }
                else
                {
                    $commission_sum = $balance * 0.05 < 50 ? 50 : $balance * 0.05;
                }
            }
            else
            {
                $commission_sum = $balance * 0.07 > 5000 ? 5000 : $balance * 0.07;
            }

            //Если счет был открыт в прошлом месяце, вычисляем сумму исходя из даты открытия
            if($prevMonth == strftime('%m', strtotime($created)))
            {
                $countDaysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, strftime('%Y', strtotime($created)));
                $commission_sum = $commission_sum / $countDaysInPrevMonth * ($countDaysInPrevMonth - (strftime('%d', strtotime($created)) -1));
            }

            //Записываем данные в БД
            $history = new History();
            $accountEntity = new Account();

            $history->setAccount($account);
            $history->setDate($today);
            $history->setOperationType('commission');
            $history->setSum($commission_sum);
            $this->entityManager->persist($history);

            $accountEntity->setId($account->getId());
            $accountEntity->setClient($account->getClient());
            $accountEntity->setAccountType($account->getAccountType());
            $accountEntity->setAccountCurrency($account->getAccountCurrency());
            $accountEntity->setDateCreate($account->getDateCreate());
            $accountEntity->setAccountNumber($account->getAccountNumber());
            $accountEntity->setSum($account->getSum());
            $accountEntity->setPercent($account->getPercent());
            $accountEntity->setBalance($account->getBalance() - $commission_sum);
            $this->entityManager->merge($accountEntity);

            $this->entityManager->flush();
        }
    }
}