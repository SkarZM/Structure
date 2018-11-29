<?php
namespace SkarZMTest\Structure\Repository\Doctrine;

use PHPUnit\Framework\TestCase;
use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use SkarZM\Structure\Repository\Doctrine\NodeFactory;
use SkarZM\Structure\Repository\Doctrine\Node;
use SkarZM\Structure\Entity\DoctrineNode;

class NodeFactoryTest extends TestCase {
	/**
	 * @throws \Exception
	 */
	public function test__invoke() {
		// Mock EntityManager
		$entityManager = $this->createMock(EntityManager::class);
		$entityManager->method('getRepository')->will($this->returnValueMap([
			[ DoctrineNode::class, $this->createMock(Node::class) ]
		]));

		// Mock ContainerInterface
		$mockContainerInterface = $this->createMock(ContainerInterface::class);
		$mockContainerInterface->method('get')->will($this->returnValueMap([
			[ EntityManager::class, $entityManager ]
		]));
		/** @var ContainerInterface $mockContainerInterface */

		// Create Factory
		$factory = new NodeFactory();
		$router = $factory($mockContainerInterface, random_bytes(random_int(1, 10)));

		// Asserts
		$this->assertInstanceOf(Node::class, $router);
	}
}
