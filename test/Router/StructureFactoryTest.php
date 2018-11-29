<?php
namespace SkarZMTest\Structure\Router;

use PHPUnit\Framework\TestCase;
use Interop\Container\ContainerInterface;
use SkarZM\Structure\Service\Structure as ServiceStructure;
use SkarZM\Structure\Router\StructureFactory;
use SkarZM\Structure\Router\Structure;

class StructureFactoryTest extends TestCase {
	/**
	 * @throws \Exception
	 */
	public function testFactorySuccess() {
		// Mock ContainerInterface
		$mockContainerInterface = $this->createMock(ContainerInterface::class);
		$mockContainerInterface->method('get')
			->will($this->returnValueMap([
				[ ServiceStructure::class, $this->createMock(ServiceStructure::class) ]
			]));
		/** @var ContainerInterface $mockContainerInterface */

		// Create Factory
		$factory = new StructureFactory();
		$router = $factory($mockContainerInterface, random_bytes(random_int(1, 10)));

		// Asserts
		$this->assertInstanceOf(Structure::class, $router);
	}
}
