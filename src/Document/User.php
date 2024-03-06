<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @MongoDB\MappedSuperclass
 */
class User implements UserInterface,PasswordAuthenticatedUserInterface
{
    #[MongoDB\Id]
    protected ?string $id;

    #[MongoDB\Field(type: 'string')]
    #[Assert\NotBlank]
    protected ?string $first_name;

    #[Assert\NotBlank]

    #[MongoDB\Field(type: 'string')]
    protected ?string $second_name;
    #[Assert\NotBlank]
    #[Assert\Email]
    #[MongoDB\Field(type: 'string')]
    protected ?string $email;

    #[MongoDB\Field(type: 'string')]
    #[Assert\NotBlank]
    protected ?string $password;

    #[MongoDB\Field(type: 'string')]
    protected ?string $role = null;
    #[MongoDB\Field(type: 'date')]
    protected ?string $created_at = null;

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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
}
