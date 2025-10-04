<?php

namespace App\Model;

class Cat
{
    public function __construct(
        private int $id,
        private string $name,
        private string $race,
        private string $owner,
        private CatStatusEnum $status,
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


    public function getStatus(): CatStatusEnum
    {
        return $this->status;
    }

    public function getStatusString(): string
    {
        return $this->status->value;
    }

    public function getStatusImageFilename(): string
    {
        return match ($this->status) {
            CatStatusEnum::EEPY => 'images/status-eepy.png',
            CatStatusEnum::PURRING => 'images/status-purring.png',
            CatStatusEnum::ZOOMIES => 'images/status-zoomies.png',
        };
    }

}
