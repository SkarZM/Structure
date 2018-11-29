<?php
namespace SkarZM\Structure\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use SkarZM\Structure\Repository\NodeInterface;
use SkarZM\Structure\Entity\NodeInterface as EntityNodeInterface;

class Node extends EntityRepository implements NodeInterface {
	/**
	 * @param $path
	 *
	 * @return EntityNodeInterface
	 *
	 * @throws \Doctrine\ORM\NonUniqueResultException
	 */
	public function findByPath($path): ?EntityNodeInterface {
		$queryBuilder = $this->createQueryBuilder('n')
			->select('n')
			->where('n.path = :path');

		return $queryBuilder->getQuery()
			->setParameters(['path' => $path])
			->getOneOrNullResult();
	}

	/**
	 * @param $name
	 *
	 * @return null|EntityNodeInterface
	 *
	 * @throws \Doctrine\ORM\NonUniqueResultException
	 */
	public function findByName($name): ?EntityNodeInterface {
		$queryBuilder = $this->createQueryBuilder('n')
			->select('n')
			->where('n.name = :name');

		return $queryBuilder->getQuery()
			->setParameters(['name' => $name])
			->getOneOrNullResult();
	}
}
