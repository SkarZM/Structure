<?php
namespace SkarZM\Structure\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Item
 *
 * @ORM\Entity(repositoryClass="\SkarZM\Structure\Repository\Doctrine\Node")
 * @ORM\Table(
 *     name="structure_node",
 *     uniqueConstraints={ @ORM\UniqueConstraint(columns={"name"}) },
 *     indexes={@ORM\Index(name="path_index", columns={"path"})}
 * )
 */
class DoctrineNode implements NodeInterface {
	/**
	 * @var integer
	 *
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id", options={ "unsigned"=true })
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", name="name", nullable=false)
	 */
	protected $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", name="path", nullable=false)
	 */
	protected $path;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", name="controller", nullable=false)
	 */
	protected $controller;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", name="action", nullable=false)
	 */
	protected $action;

	/**
	 * @var array
	 *
	 * @ORM\Column(type="array", name="params", nullable=false)
	 */
	protected $params = [];

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", name="title", nullable=false)
	 */
	protected $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", name="meta_description", nullable=false)
	 */
	protected $metaDescription;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", name="meta_keywords", nullable=false)
	 */
	protected $metaKeywords;

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return DoctrineNode
	 */
	public function setName(string $name): DoctrineNode {
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPath(): string {
		return $this->path;
	}

	/**
	 * @param string $path
	 *
	 * @return DoctrineNode
	 */
	public function setPath(string $path): DoctrineNode {
		$this->path = $path;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getController(): string {
		return $this->controller;
	}

	/**
	 * @param string $controller
	 *
	 * @return DoctrineNode
	 */
	public function setController(string $controller): DoctrineNode {
		$this->controller = $controller;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getAction(): string {
		return $this->action;
	}

	/**
	 * @param string $action
	 *
	 * @return DoctrineNode
	 */
	public function setAction(string $action): DoctrineNode {
		$this->action = $action;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getParams(): array {
		return $this->params;
	}

	/**
	 * @param array $params
	 *
	 * @return DoctrineNode
	 */
	public function setParams(array $params): DoctrineNode {
		$this->params = $params;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * @param string $title
	 *
	 * @return DoctrineNode
	 */
	public function setTitle(string $title): DoctrineNode {
		$this->title = $title;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMetaDescription(): string {
		return $this->metaDescription;
	}

	/**
	 * @param string $metaDescription
	 *
	 * @return DoctrineNode
	 */
	public function setMetaDescription(string $metaDescription): DoctrineNode {
		$this->metaDescription = $metaDescription;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMetaKeywords(): string {
		return $this->metaKeywords;
	}

	/**
	 * @param string $metaKeywords
	 *
	 * @return DoctrineNode
	 */
	public function setMetaKeywords(string $metaKeywords): DoctrineNode {
		$this->metaKeywords = $metaKeywords;

		return $this;
	}
}
