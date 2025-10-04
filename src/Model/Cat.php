<?php

namespace App\Model;

class Cat
{
    public function __construct(
        private int $id,
        private string $name,
        private string $race,
        private string $owner,
        private string $status,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getRace(): string
    {
        return $this->race;
    }


    public function getOwner(): string
    {
        return $this->owner;
    }


    public function getStatus(): string
    {
        return $this->status;
    }

}
