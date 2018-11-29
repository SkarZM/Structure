<?php
namespace SkarZM\Structure;

use SkarZM\Structure\Router;
use SkarZM\Structure\Service;

return [
	'router' => [
		'routes' => [
			'structure' => [
				'type' => Router\Structure::class,
			],
		],
	],

	'route_manager' => [
		'factories' => [
			Router\Structure::class => Router\StructureFactory::class,
		],
	],

	'service_manager' => [
		'factories' => [
			Service\Structure::class => Service\StructureFactory::class,
			Repository\NodeInterface::class => Repository\Doctrine\NodeFactory::class,
			Router\Listener::class => Router\ListenerFactory::class,
		],
	],

	'listeners' => [
		Router\Listener::class,
	],

	'doctrine' => [
		'driver' => [
			'Structure\Entity' => [
				'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
				'cache' => 'array',
				'paths' => [
					__DIR__ . '/../src/Entity'
				],
			],

			'orm_default' => [
				'drivers' => [
					'Structure\Entity' => 'Structure\Entity',
				],
			],
		],
	],
];
