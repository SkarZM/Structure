<?php
namespace SkarZMTest\Structure\Router;

use PHPUnit\Framework\TestCase;
use Interop\Container\ContainerInterface;
use SkarZM\Structure\Router\ListenerFactory;
use SkarZM\Structure\Router\Listener;
use SkarZM\Structure\Service\Structure as ServiceStructure;

class ListenerFactoryTest extends TestCase {
	/**
	 * @throws \Exception
	 */
	public function test__invoke() {
		// Mock ContainerInterface
		$mockContainerInterface = $this->createMock(ContainerInterface::class);
		$mockContainerInterface->method('get')
			->will($this->returnValueMap([
				[ ServiceStructure::class, $this->createMock(ServiceStructure::class) ]
			]));
		/** @var ContainerInterface $mockContainerInterface */

		// Create Factory
		$factory = new ListenerFactory();
		$router = $factory($mockContainerInterface, random_bytes(random_int(1, 10)));

		// Asserts
		$this->assertInstanceOf(Listener::class, $router);
	}
}
