<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MoviesRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MoviesRepository $repository): Response
    {
        $series = $repository->findAll();
        $movies = $repository->findAll();
        $animes = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'series' => $series,
            'movies' => $movies,
            'animes' => $animes
        ]);
    }
}
