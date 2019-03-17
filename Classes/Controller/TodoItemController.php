<?php
namespace Task\Todo\Controller;

/*
 * This file is part of the Task.Todo package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Task\Todo\Domain\Model\TodoItem;

class TodoItemController extends ActionController
{

    /**
     * @Flow\Inject
     * @var \Task\Todo\Domain\Repository\TodoItemRepository
     */
    protected $todoItemRepository;

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('todoItems', $this->todoItemRepository->findTodos());
    }

    /**
     * @param \Task\Todo\Domain\Model\TodoItem $todoItem
     * @return void
     */
    public function showAction(TodoItem $todoItem)
    {
        $this->view->assign('todoItem', $todoItem);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * @param \Task\Todo\Domain\Model\TodoItem $newTodoItem
     * @return void
     */
    public function createAction(TodoItem $newTodoItem)
    {
        $this->todoItemRepository->add($newTodoItem);
        $this->addFlashMessage('Created a new todo item.');
        $this->redirect('index');
    }

    /**
     * @param \Task\Todo\Domain\Model\TodoItem $todoItem
     * @return void
     */
    public function editAction(TodoItem $todoItem)
    {
        $this->view->assign('todoItem', $todoItem);
    }

    /**
     * @param \Task\Todo\Domain\Model\TodoItem $todoItem
     * @return void
     */
    public function updateAction(TodoItem $todoItem)
    {
        $this->todoItemRepository->update($todoItem);
        $this->addFlashMessage('Updated the todo item.');
        $this->redirect('index');
    }

    /**
     * @param \Task\Todo\Domain\Model\TodoItem $todoItem
     * @return void
     */
    public function doneAction(TodoItem $todoItem)
    {
        $currentStatus = $todoItem->getStatus();
        $todoItem->setStatus(!$currentStatus);
        $this->persistenceManager->update($todoItem);
        $this->persistenceManager->persistAll();
        $this->addFlashMessage('Updated the todo item.');
        $this->redirect('index');
    }

    /**
     * @param \Task\Todo\Domain\Model\TodoItem $todoItem
     * @return void
     */
    public function deleteAction(TodoItem $todoItem)
    {
        $this->todoItemRepository->remove($todoItem);
        $this->addFlashMessage('Deleted a todo item.');
        $this->redirect('index');
    }
}
