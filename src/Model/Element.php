<?php

namespace App\Model;

use App\Model\State;
use App\Model\Family;
use App\Model\Abundance;


class Element
{

    private ?int $id;
    private string $name;
    private int $atomicNumber;
    private string $chemicalSymbol;
    private float $atomicMass;
    private int $group;
    private int $period;
    private string $definition;
    private \DateTime $discoveryDate;
    private string $elementPicture;
    private string $elementModel;
    private State $state;
    private Family $family;
    private Abundance $abundance;
    


    public function __construct(
        int|null $id,
        string $name,
        int $atomicNumber,
        string $chemicalSymbol,
        float $atomicMass,
        int $group,
        int $period,
        string $definition,
        \DateTime $discoveryDate,
        string $elementPicture,
        string $elementModel,
        State $state,
        Family $family,
        Abundance $abundance
    ) {

        $this->id = $id;
        $this->name = $name;
        $this->atomicNumber = $atomicNumber;
        $this->chemicalSymbol = $chemicalSymbol;
        $this->atomicMass = $atomicMass;
        $this->group = $group;
        $this->period = $period;
        $this->definition = $definition;
        $this->discoveryDate = $discoveryDate;
        $this->elementPicture = $elementPicture;
        $this->elementModel = $elementModel;
        $this->state = $state;
        $this->family = $family;
        $this->abundance = $abundance;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
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
     * Get the value of atomicNumber
     */
    public function getAtomicNumber(): int
    {
        return $this->atomicNumber;
    }

    /**
     * Set the value of atomicNumber
     *
     * @return  self
     */
    public function setAtomicNumber($atomicNumber): self
    {
        $this->atomicNumber = $atomicNumber;

        return $this;
    }

    /**
     * Get the value of chemicalSymbol
     */
    public function getChemicalSymbol(): string
    {
        return $this->chemicalSymbol;
    }

    /**
     * Set the value of chemicalSymbol
     *
     * @return  self
     */
    public function setChemicalSymbol($chemicalSymbol): self
    {
        $this->chemicalSymbol = $chemicalSymbol;

        return $this;
    }

    /**
     * Get the value of atomicMass
     */
    public function getAtomicMass(): float
    {
        return $this->atomicMass;
    }

    /**
     * Set the value of atomicMass
     *
     * @return  self
     */
    public function setAtomicMass($atomicMass): self
    {
        $this->atomicMass = $atomicMass;

        return $this;
    }

    /**
     * Get the value of group
     */
    public function getGroup(): int
    {
        return $this->group;
    }

    /**
     * Set the value of group
     *
     * @return  self
     */
    public function setGroup($group): self
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get the value of period
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * Set the value of period
     *
     * @return  self
     */
    public function setPeriod($period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get the value of definition
     */
    public function getDefinition(): string
    {
        return $this->definition;
    }

    /**
     * Set the value of definition
     *
     * @return  self
     */
    public function setDefinition($definition): self
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get the value of discoveryDate
     */
    public function getDiscoveryDate(): \DateTime
    {
        return $this->discoveryDate;
    }

    public function getDiscoveryDateFormat(): string
    {
        return date_format($this->discoveryDate,"Y-m-d");
    }

    /**
     * Set the value of discoveryDate
     *
     * @return  self
     */
    public function setDiscoveryDate($discoveryDate): self
    {
        $this->discoveryDate = $discoveryDate;

        return $this;
    }

    /**
     * Get the value of elementPicture
     */
    public function getElementPicture(): string
    {
        return $this->elementPicture;
    }

    /**
     * Set the value of elementPicture
     *
     * @return  self
     */
    public function setElementPicture($elementPicture): self
    {
        $this->elementPicture = $elementPicture;

        return $this;
    }

    /**
     * Get the value of elementModel
     */
    public function getElementModel(): string
    {
        return $this->elementModel;
    }

    /**
     * Set the value of elementModel
     *
     * @return  self
     */
    public function setElementModel($elementModel): self
    {
        $this->elementModel = $elementModel;

        return $this;
    }

    /**
     * Get the value of state
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */
    public function setState($state): State
    {
        $this->state = $state;

        return $this->state;
    }

    /**
     * Get the value of family
     */
    public function getFamily(): Family
    {
        return $this->family;
    }

    /**
     * Set the value of family
     *
     * @return  self
     */
    public function setFamily($family): Family
    {
        $this->family = $family;

        return $this->family;
    }

    /**
     * Get the value of abundance
     */
    public function getAbundance(): Abundance
    {
        return $this->abundance;
    }

    /**
     * Set the value of abundance
     *
     * @return  self
     */
    public function setAbundance($abundance): Abundance
    {
        $this->abundance = $abundance;

        return $this->abundance;
    }

}
