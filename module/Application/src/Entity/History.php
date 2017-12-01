<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Этот класс представляет запись в историю.
 * @ORM\Entity()
 * @ORM\Table(name="history")
 */
class History
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * Много записей в историю привязаны к одному счету
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Account")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     */
    protected $account;

    /**
     * @ORM\Column(name="date")
     */
    protected $date;

    /**
     * @ORM\Column(name="operation_type")
     */
    protected $operationType;

    /**
     * @ORM\Column(name="sum")
     */
    protected $sum;

    /**
     * Возвращает ID.
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Задает счет
     * @param @ORM\Application\Entity\Account;
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * Возвращает счет
     * @return @ORM\Application\Entity\Account;
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Задает дату создания.
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Возвращает дату создания.
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Задает тип операции.
     * @param string $operation_type
     */
    public function setOperationType($operation_type)
    {
        $this->operationType = $operation_type;
    }

    /**
     * Возвращает тип операции.
     * @return string
     */
    public function getOperationType()
    {
        return $this->operationType;
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

}