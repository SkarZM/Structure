<?php
namespace SkarZMTest\Structure\Service;

use PHPUnit\Framework\TestCase;
use Interop\Container\ContainerInterface;
use SkarZM\Structure\Repository\NodeInterface;
use SkarZM\Structure\Service\StructureFactory;
use SkarZM\Structure\Service\Structure;

class StructureFactoryTest extends TestCase {
	/**
	 * @throws \Exception
	 */
	public function test__invoke() {
		// Mock ContainerInterface
		$mockContainerInterface = $this->createMock(ContainerInterface::class);
		$mockContainerInterface->method('get')
			->will($this->returnValueMap([
				[ NodeInterface::class, $this->createMock(NodeInterface::class) ]
			]));
		/** @var ContainerInterface $mockContainerInterface */

		// Create Factory
		$factory = new StructureFactory();
		$router = $factory($mockContainerInterface, random_bytes(random_int(1, 10)));

		// Asserts
		$this->assertInstanceOf(Structure::class, $router);
	}
}
