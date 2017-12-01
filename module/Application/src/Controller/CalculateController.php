<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class CalculateController extends AbstractActionController
{
    /**
     * Service Calculator.
     * @var Application\Service\Calculator
     */
    private $calculator;

    public function __construct($calculator)
    {
        $this->calculator = $calculator;
    }

    public function percentAction()
    {
        $this->calculator->calculatePercent();
        return $this->getResponse();
    }

    public function commissionAction()
    {
        $this->calculator->calculateCommission();
        return $this->getResponse();
    }
}
