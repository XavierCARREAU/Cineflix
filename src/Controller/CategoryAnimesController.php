<?php

namespace App\Controller;

use App\Repository\MoviesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryAnimesController extends AbstractController
{
    #[Route('/categorie/animes', name: 'app_category_animes')]
    public function index(MoviesRepository $repository): Response
    {
        $animes = $repository->findAll();
        return $this->render('category_animes/index.html.twig', [
            'animes' => $animes
        ]);
    }
}