<?php

namespace App\Model;

class State
{
    private ?int $id;
    private string $name;

    public function __construct(int|null $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the value of id
     */
    public function getId(): int|null
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
}
