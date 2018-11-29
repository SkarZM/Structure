<?php
namespace SkarZM\Structure\Service;

use Interop\Container\ContainerInterface;
use SkarZM\Structure\Repository\NodeInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class StructureFactory implements FactoryInterface {
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
		return new Structure(
			$container->get(NodeInterface::class)
		);
	}
}
