<?php

namespace App\Model;

class Abundance
{

    private ?int $id;
    private string $name;
    private string $description;


    public function __construct(int|null $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
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
}
