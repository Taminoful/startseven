<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(CatRepository $catRepository): Response
    {
        $cats = $catRepository->findAll();
        $catCount = count($cats);

        $myCat = $cats[array_rand($cats)];

        return $this->render('main/index.html.twig', [
            'myCat' => $myCat,
            'cats' => $cats,
        ]);
    }
}
