<?php

namespace App\Domain\Model;

class Member
{
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private ?string $password = null
    ){}
    public function id(): ?string
    {
        return $this->id;
    }
    public function name(): ?string
    {
        return $this->name;
    }
    public function changeName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function email(): ?string
    {
        return $this->email;
    }
    public function changeEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function password(): ?string
    {
        return $this->password;
    }
    public function changePassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
