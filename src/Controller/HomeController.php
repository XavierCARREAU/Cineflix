<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MoviesRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MoviesRepository $movies_repo): Response
    {
        $movies = $movies_repo->findAll();

        return $this->render('home/index.html.twig', [
            'movies' => $movies
        ]);
    }
}
