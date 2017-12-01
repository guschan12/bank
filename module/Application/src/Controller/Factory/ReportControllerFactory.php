<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Controller\ReportController;

Class ReportControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,$requestedName, array $opt = null)
    {
        $reportManager = $container->get(\Application\Service\ReportManager::class);

        return new ReportController($reportManager);
    }
}