<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Этот класс представляет собой тип счета.
 * @ORM\Entity()
 * @ORM\Table(name="account_types")
 */
class AccountType
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="type")
     */
    protected $type;

    /**
     * @ORM\Column(name="name")
     */
    protected $name;

    /**
     * Возвращает ID.
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Задает тип счета.
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Возвращает тип счета.
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Задает имя типу счета.
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Возвращает имя типа счета.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}