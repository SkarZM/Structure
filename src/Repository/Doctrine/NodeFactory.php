<?php
namespace SkarZM\Structure\Repository\Doctrine;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class NodeFactory implements FactoryInterface {
	/**
	 * Create an object
	 *
	 * @param  ContainerInterface $container
	 * @param  string $requestedName
	 * @param  null|array $options
	 *
	 * @return object
	 *
	 * @throws ServiceNotFoundException if unable to resolve the service.
	 * @throws ServiceNotCreatedException if an exception is raised when creating a service.
	 */
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
		/** @var \Doctrine\ORM\EntityManager $em */
		$em = $container->get(\Doctrine\ORM\EntityManager::class);
		/** @var \SkarZM\Structure\Entity\NodeInterface $repository */
		return $em->getRepository(\SkarZM\Structure\Entity\DoctrineNode::class);
	}
}
