<?php

namespace App\Model;

class Family
{

    private ?int $id;
    private string $name;
    private string $description;
    private bool $metal;


    public function __construct(string $name, string $description, bool $metal)
    {
        $this->name = $name;
        $this->description = $description;
        $this->metal = $metal;
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

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of metal
     */
    public function getMetal(): bool
    {
        return $this->metal;
    }

    /**
     * Set the value of metal
     *
     * @return  self
     */
    public function setMetal($metal): self
    {
        $this->metal = $metal;

        return $this;
    }
}
