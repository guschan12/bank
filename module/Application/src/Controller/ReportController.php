<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ReportController extends AbstractActionController
{
    /**
     * Service ReportManager.
     * @var \Application\Service\ReportManager
     */
    private $reportManager;

    public function __construct($reportManager)
    {
        $this->reportManager = $reportManager;
    }

    public function balanceAction()
    {
        $balance = $this->reportManager->getAccountBalance();
        return new ViewModel([
            'balance' => $balance
        ]);
    }

    public function depositAverageAction()
    {
        $avgDepositSum = $this->reportManager->getAverageDepositSum();
        return new ViewModel([
            'avg' => $avgDepositSum
        ]);
    }
}
