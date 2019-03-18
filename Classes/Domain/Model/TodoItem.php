<?php
namespace Task\Todo\Domain\Model;

/*
 * This file is part of the Task.Todo package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class TodoItem
{
    /**
     * @Flow\Validate(type="NotEmpty")
     * @Flow\Validate(type="StringLength", options={ "minimum"=1, "maximum"=255 })
     * @var string
     */
    protected $name;


    /**
     * @var boolean
     * @ORM\Column(nullable=true)
     */
    protected $status;


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
