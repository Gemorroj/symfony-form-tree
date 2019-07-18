<?php

namespace App\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Tree
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var ArrayCollection */
    private $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Tree
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getChildren(): ArrayCollection
    {
        return $this->children;
    }

    public function setChildren(ArrayCollection $children): self
    {
        $this->children = $children;
        return $this;
    }

    public function addChild(self $child): self
    {
        $this->children->add($child);
        return $this;
    }

    public function removeChild(self $child): self
    {
        $this->children->removeElement($child);
        return $this;
    }
}
