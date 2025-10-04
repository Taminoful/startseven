<?php

namespace App\Repository;

use App\Model\Cat;
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
                'Hungry',
            ),
            new Cat(
                2,
                'Ivyberry',
                'Tortoiseshell',
                'James',
                'Sleeping',
            ),
            new Cat(
                3,
                'Chino',
                'Tom',
                'Kathryn',
                'Purring',
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
