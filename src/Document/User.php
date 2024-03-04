<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

class User
{

    #[MongoDB\Id]
    protected ?string $id;

    #[MongoDB\Field(type: 'string')]
    protected ?string $first_name = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $second_name = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $email = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $pwd = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getSecondName(): ?string
    {
        return $this->second_name;
    }

    public function setSecondName(string $second_name): static
    {
        $this->second_name = $second_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): static
    {
        $this->pwd = $pwd;

        return $this;
    }
    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {

        $this->role = $role ?? 'client';

        return $this;
    }
}
