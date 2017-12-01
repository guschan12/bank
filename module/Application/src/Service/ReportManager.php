<?php

namespace Application\Service;

use Application\Entity\Account;
use Application\Entity\History;

class ReportManager
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

    public function getAverageDepositSum()
    {
        return $this->entityManager->getRepository(Account::class)->getAverageDepositByGroups();
    }

    public function getAccountBalance()
    {
        return $this->entityManager->getRepository(Account::class)->getAccountBalance();
    }
}