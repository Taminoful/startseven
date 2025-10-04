<?php

namespace App\Controller;

use App\Repository\CatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/cats')]
class CatApiController extends AbstractController
{
    #[Route('', name: 'api_cats', methods: ['GET'])]
    public function getCollection(CatRepository $catRepository): JsonResponse
    {
        $cats = $catRepository->findAll();

        return $this->json($cats);
    }

    #[Route('/{id<\d+>}', name: 'api_cat_show', methods: ['GET'])]
    public function getCat(int $id, CatRepository $catRepository): JsonResponse
    {
        $cat = $catRepository->find($id);

        if (!$cat) {
            throw $this->createNotFoundException('Cat not found');
        }

        return $this->json($cat);
    }
}
