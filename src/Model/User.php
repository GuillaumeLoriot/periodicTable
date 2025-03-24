<?php

namespace App\Model;

class User
{

    private ?int $id;
    private string $username;
    private string $name;
    private string $firstName;
    private string $mail;
    private string $password;
    private string $profilPicture;

    public function __construct(int|null $id, string $username, string $name, string $firstName, string $mail, string $password, string $profilPicture)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->mail = $mail;
        $this->password = $password;
        $this->profilPicture = $profilPicture;
    }



    /**
     * Get the value of id
     */
    public function getId(): int|null
    {
        return $this->id;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
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
     * Get the value of firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of profilPicture
     */
    public function getProfilPicture(): string
    {
        return $this->profilPicture;
    }

    /**
     * Set the value of profilPicture
     *
     * @return  self
     */
    public function setProfilPicture($profilPicture): self
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }
}
