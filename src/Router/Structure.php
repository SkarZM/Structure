<?php
namespace SkarZM\Structure\Router;

use Zend\Router\Http\RouteInterface;
use Zend\Router\Http\RouteMatch;
use Zend\Router\Http\TreeRouteStack;
use Zend\Router\Exception;
use Zend\Stdlib\RequestInterface as Request;
use SkarZM\Structure\Service\Structure as ServiceStructure;

class Structure extends TreeRouteStack implements RouteInterface {
	/**
	 * @var ServiceStructure
	 */
	protected $service;

	/**
	 * Structure constructor.
	 *
	 * @param ServiceStructure $service
	 */
	public function __construct(ServiceStructure $service) {
		$this->service = $service;
	}

	/**
	 * Create a new route with given options.
	 *
	 * @param  array|\Traversable $options
	 *
	 * @throws \Exception
	 */
	public static function factory($options = []) {
		throw new Exception\RuntimeException('You must use \'StructureFactory\'');
	}

	/**
	 * Match a given request.
	 *
	 * @see    \Zend\Router\RouteInterface::match()
	 *
	 * @param  Request $request
	 * @param  integer|null $pathOffset
	 * @param  array $options
	 *
	 * @return RouteMatch|null
	 */
	public function match(Request $request, $pathOffset = null, array $options = []) {
		if (!method_exists($request, 'getUri')) {
			return null;
		}

		/** @var \Zend\Http\Request $request */
		$uri = $request->getUri();
		$path = $uri->getPath();

		if (!$node = $this->service->getNodeByPath($path)) {
			return null;
		}

		$params = $node->getParams();
		$params['controller'] = $node->getController();
		$params['action'] = $node->getAction();

		$routeMatch = new RouteMatch($params, strlen($path));
		$routeMatch->setMatchedRouteName($node->getName());

		return $routeMatch;
	}

	/**
	 * Assemble the route.
	 *
	 * @param  array $params
	 * @param  array $options
	 *
	 * @return mixed
	 */
	public function assemble(array $params = [], array $options = []) {
		if (!isset($options['name'])) {
			throw new Exception\InvalidArgumentException('Missing "name" option');
		}

		if (!$node = $this->service->getNodeByName($options['name'])) {
			return null;
		}

		return $node->getPath();
	}

	/**
	 * Get a list of parameters used while assembling.
	 *
	 * @return array
	 */
	public function getAssembledParams() {
		return [];
	}
}
