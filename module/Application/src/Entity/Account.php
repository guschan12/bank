<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Этот класс представляет собой счет.
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="\Application\Repository\AccountRepository")
 * @ORM\Table(name="accounts")
 */
class Account
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * Много счетов привязаны к одному клиенту
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    protected $client;

    /**
     * Много счетов привязаны к одному типу счета
     * @ORM\ManyToOne(targetEntity="\Application\Entity\AccountType")
     * @ORM\JoinColumn(name="account_type_id", referencedColumnName="id")
     */
    protected $accountType;

    /**
     * Много счетов привязаны к одной валюте
     * @ORM\ManyToOne(targetEntity="\Application\Entity\AccountCurrency")
     * @ORM\JoinColumn(name="account_currency_id", referencedColumnName="id")
     */
    protected $accountCurrency;

    /**
     * @ORM\Column(name="date_create")
     */
    protected $dateCreate;

    /**
     * @ORM\Column(name="account_number")
     */
    protected $accountNumber;

    /**
     * @ORM\Column(name="sum")
     */
    protected $sum;

    /**
     * @ORM\Column(name="percent")
     */
    protected $percent;

    /**
     * @ORM\Column(name="balance")
     */
    protected $balance;

    /**
     * Задает ID.
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Возвращает ID.
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Задает клиента
     * @param @ORM\Application\Entity\Client;
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Возвращает сущность клиента
     * @return @ORM\Application\Entity\Client;
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Задает тип счета
     * @param @ORM\Application\Entity\AccountType;
     */
    public function setAccountType($account_type)
    {
        $this->accountType = $account_type;
    }

    /**
     * Возвращает сущность тип счета
     * @return @ORM\Application\Entity\AccountType;
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Задает валюту счета
     * @param @ORM\Application\Entity\AccountCurrency;
     */
    public function setAccountCurrency($account_currency)
    {
        $this->accountCurrency= $account_currency;
    }

    /**
     * Возвращает сущность валюта счета
     * @return @ORM\Application\Entity\AccountCurrency;
     */
    public function getAccountCurrency()
    {
        return $this->accountCurrency;
    }

    /**
     * Задает дату создания.
     * @param string $date_create
     */
    public function setDateCreate($date_create)
    {
        $this->dateCreate = $date_create;
    }

    /**
     * Возвращает дату создания.
     * @return string
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Задает номер счета.
     * @param string $account_number
     */
    public function setAccountNumber($account_number)
    {
        $this->accountNumber = $account_number;
    }

    /**
     * Возвращает номер счета.
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Задает сумму.
     * @param string $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    /**
     * Возвращает сумму.
     * @return string
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Задает проценты.
     * @param string $percent
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
    }

    /**
     * Возвращает проценты.
     * @return string
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Задает баланс.
     * @param string $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * Возвращает баланс.
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

}