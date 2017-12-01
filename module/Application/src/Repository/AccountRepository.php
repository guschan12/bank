<?php

namespace Application\Repository;

use Application\Entity\Account;
use Application\Entity\AgeCategory;
use Doctrine\ORM\EntityRepository;

// Это пользовательский класс репозитория для сущности Счет.
class AccountRepository extends EntityRepository
{
    public function getMonthOldAccounts()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('account')
            ->from(Account::class, 'account')
            ->where("CURRENT_DATE() = DATE_ADD(account.dateCreate, 1, 'MONTH')");
        return $qb->getQuery()->getResult();
    }

    public function getAverageDepositByGroups()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('ac.name, avg(acc.sum) as sum_avg')
            ->from(AgeCategory::class, 'ac')
            ->leftJoin('ac.clients', 'cl')
            ->leftJoin('cl.accounts', 'acc')
            ->addGroupBy('ac.id')
            ->orderBy('ac.id', 'DESC');
        return $qb->getQuery()->getResult();
    }

    public function getAccountBalance()
    {
        $sql = "SELECT com.date, (sum(commission) - sum(percent)) as total FROM
                (SELECT DATE_FORMAT(date, \"%Y-%m\") as date, sum(`sum`) as commission FROM history WHERE operation_type = 'commission' GROUP BY date) AS com
                LEFT JOIN
                (SELECT DATE_FORMAT(date, \"%Y-%m\") as fdate, sum(`sum`) as percent FROM history WHERE operation_type = 'percent' GROUP BY fdate) AS proc ON com.date = proc.fdate
                GROUP BY com.date";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}