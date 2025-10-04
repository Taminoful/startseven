<?php

namespace App\Controller;

use App\Repository\CatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatController extends AbstractController
{
    #[Route('/cats/{id<\d+>}', name: 'app_cat_show', methods: ['GET'])]
    public function show(int $id, CatRepository $catRepository): Response
    {
        $cat = $catRepository->find($id);
        if (!$cat) {
            throw $this->createNotFoundException('Cat '.$id.' not found');
        }

        return $this->render('cats/show.html.twig', [
            'cat' => $cat,
        ]);
    }
}
