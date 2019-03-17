<?php
namespace Task\Todo\Domain\Repository;

/*
 * This file is part of the Task.Todo package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\QueryInterface;
use Neos\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class TodoItemRepository extends Repository
{
	public function findTodos() {
		$query = $this->createQuery();
		return
			$query
				->setOrderings(array('status' => QueryInterface::ORDER_ASCENDING))
				->execute();
	}
}
