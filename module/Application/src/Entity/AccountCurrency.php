<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Этот класс представляет собой валюту счета.
 * @ORM\Entity()
 * @ORM\Table(name="account_currencies")
 */
class AccountCurrency
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="code")
     */
    protected $code;

    /**
     * @ORM\Column(name="sign")
     */
    protected $sign;

    /**
     * Возвращает ID.
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Задает код валюты счета.
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Возвращает код валюты счета.
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Задает знак валюты счета.
     * @param string $sign
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
    }

    /**
     * Возвращает знак валюты счета.
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }
}