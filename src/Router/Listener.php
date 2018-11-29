<?php
namespace SkarZM\Structure\Router;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use SkarZM\Structure\Service\Structure;
use Zend\Mvc\MvcEvent;
use Zend\View\Renderer\PhpRenderer;

class Listener implements ListenerAggregateInterface {
	use \Zend\EventManager\ListenerAggregateTrait;

	/**
	 * @var Structure
	 */
	protected $serviceStructure;

	public function __construct(Structure $serviceStructure) {
		$this->serviceStructure = $serviceStructure;
	}

	/**
	 * Attach one or more listeners
	 *
	 * Implementors may add an optional $priority argument; the EventManager
	 * implementation will pass this to the aggregate.
	 *
	 * @param EventManagerInterface $events
	 * @param int $priority
	 *
	 * @return void
	 */
	public function attach(EventManagerInterface $events, $priority = 100) {
		$this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER, [$this, 'onRender'], $priority);
	}

	/**
	 * @param MvcEvent $event
	 */
	public function onRender(MvcEvent $event) {
		if (!$routeMatch = $event->getRouteMatch()) {
			return;
		}

		$routeName = $routeMatch->getMatchedRouteName();

		if (strpos($routeName, 'structure/') !== 0) {
			return;
		}

		if (!$nodeName = substr($routeName, 10)) {
			return;
		}

		/** @var $renderer \Zend\View\Renderer\RendererInterface */
		$renderer = $event->getApplication()->getServiceManager()->get(\Zend\View\Renderer\RendererInterface::class);

		if (!$renderer instanceof PhpRenderer) {
			return;
		}

		$this->serviceStructure->applyNodeToRenderer($renderer, $this->serviceStructure->getNodeByName($nodeName));
	}
}
