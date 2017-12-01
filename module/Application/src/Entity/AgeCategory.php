<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Этот класс представляет собой возрастную категорию.
 * @ORM\Entity()
 * @ORM\Table(name="age_categories")
 */
class AgeCategory
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
     * @ORM\OneToMany(targetEntity="\Application\Entity\Client", mappedBy="ageCategory")
     */
    protected $clients;

    public function __construct() {
        $this->clients = new ArrayCollection();
    }

    /**
     * Возвращает ID категории.
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Задает имя категории.
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Возвращает имя категории.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}