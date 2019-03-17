<?php
namespace Task\Todo\Controller;

/*
 * This file is part of the Task.Todo package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;

class StandardController extends ActionController
{

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('foos', ['task1', 'task2']);
    }
}
