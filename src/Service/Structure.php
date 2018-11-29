<?php
namespace SkarZM\Structure\Service;

use SkarZM\Structure\Entity\NodeInterface as EntityNodeInterface;
use SkarZM\Structure\Repository\NodeInterface as RepositoryNodeInterface;
use Zend\View\Renderer\PhpRenderer;

class Structure {
	/**
	 * @var RepositoryNodeInterface
	 */
	public $repositoryNode;

	/**
	 * Structure constructor.
	 *
	 * @param RepositoryNodeInterface $repositoryNode
	 */
	public function __construct(RepositoryNodeInterface $repositoryNode) {
		$this->repositoryNode = $repositoryNode;
	}

	/**
	 * @param string $path
	 *
	 * @return null|EntityNodeInterface
	 */
	public function getNodeByPath(string $path): ?EntityNodeInterface {
		return $this->repositoryNode->findByPath($path);
	}

	/**
	 * @param string $name
	 *
	 * @return null|EntityNodeInterface
	 */
	public function getNodeByName(string $name): ?EntityNodeInterface {
		return $this->repositoryNode->findByName($name);
	}

	/**
	 * @param PhpRenderer $renderer
	 * @param EntityNodeInterface $node
	 */
	public function applyNodeToRenderer(PhpRenderer $renderer, EntityNodeInterface $node) {
		$renderer->headTitle($node->getTitle());
		$renderer->headMeta()->setName('description', $node->getMetaDescription());
		$renderer->headMeta()->setName('keywords', $node->getMetaKeywords());
	}
}
