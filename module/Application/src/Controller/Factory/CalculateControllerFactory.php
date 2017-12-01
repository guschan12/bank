<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Controller\CalculateController;

Class CalculateControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,$requestedName, array $opt = null)
    {
        $calculator = $container->get(\Application\Service\Calculator::class);

        return new CalculateController($calculator);
    }
}