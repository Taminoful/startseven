<?php

namespace App\Repository;

use App\Model\Cat;
use App\Model\CatStatusEnum;
use Psr\Log\LoggerInterface;

class CatRepository
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info('Cat information retrieved');

        return [
            new Cat(
                1,
                'Astroid Destroyer',
                'Tabby',
                'Mark',
                CatStatusEnum::ZOOMIES,
            ),
            new Cat(
                2,
                'Ivyberry',
                'Bobcat',
                'James',
                CatStatusEnum::EEPY,
            ),
            new Cat(
                3,
                'Chino',
                'Tom',
                'Kathryn',
                CatStatusEnum::PURRING,
            ),
        ];
    }

    public function find(int $id): ?Cat
    {
        foreach ($this->findAll() as $cat) {
            if ($cat->getId() === $id) {
                return $cat;
            }
        }

        return null;
    }
}
