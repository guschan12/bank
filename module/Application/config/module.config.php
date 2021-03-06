<?php

namespace Application;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'report-balance' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/report/balance',
                    'defaults' => [
                        'controller' => Controller\ReportController::class,
                        'action' => 'balance',
                    ],
                ],
            ],
            'report-deposit-average' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/report/deposit-average',
                    'defaults' => [
                        'controller' => Controller\ReportController::class,
                        'action' => 'depositAverage',
                    ],
                ],
            ],
            'percent' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/calculate/percent',
                    'defaults' => [
                        'controller' => Controller\CalculateController::class,
                        'action' => 'percent',
                    ],
                ],
            ],
            'commission' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/calculate/commission',
                    'defaults' => [
                        'controller' => Controller\CalculateController::class,
                        'action' => 'commission',
                    ],
                ],
            ]
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\CalculateController::class => Controller\Factory\CalculateControllerFactory::class,
            Controller\ReportController::class => Controller\Factory\ReportControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\Calculator::class => Service\Factory\CalculatorFactory::class,
            Service\ReportManager::class => Service\Factory\ReportManagerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
];
