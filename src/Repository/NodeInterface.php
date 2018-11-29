<?php
namespace SkarZM\Structure\Repository;

use SkarZM\Structure\Entity\NodeInterface as EntityNodeInterface;

interface NodeInterface {
	public function findByPath($path): ?EntityNodeInterface;
	public function findByName($name): ?EntityNodeInterface;
}
