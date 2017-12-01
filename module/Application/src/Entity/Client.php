<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Этот класс представляет собой клиента.
 * @ORM\Entity()
 * @ORM\Table(name="clients")
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="name")
     */
    protected $name;

    /**
     * @ORM\Column(name="last_name")
     */
    protected $lastName;

    /**
     * @ORM\Column(name="gender")
     */
    protected $gender;

    /**
     * @ORM\Column(name="date_of_birth")
     */
    protected $dateOfBirth;

    /**
     * Много счетов привязаны к одной валюте
     * @ORM\ManyToOne(targetEntity="\Application\Entity\AgeCategory", inversedBy="clients")
     * @ORM\JoinColumn(name="age_category_id", referencedColumnName="id")
     */
    protected $ageCategory;
    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Account", mappedBy="client")
     */
    protected $accounts;

    public function __construct() {
        $this->accounts = new ArrayCollection();
    }

    /**
     * Возвращает ID клиента.
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Задает имя клиента.
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Возвращает имя клиента.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Задает фамилию клиента.
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->lastName = $last_name;
    }

    /**
     * Возвращает имя клиента.
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Задает пол клиента.
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Возвращает пол клиента.
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Задает дату рождения клиента.
     * @param string $date_of_birth
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->dateOfBirth = $date_of_birth;
    }

    /**
     * Возвращает дату рождения клиента.
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

}