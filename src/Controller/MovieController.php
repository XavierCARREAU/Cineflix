<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MoviesRepository;


class MovieController extends AbstractController
{
    #[Route('/movie/{id}', name: 'app_movie')]
    public function index($id , MoviesRepository $movies_repo): Response
    {
        $movie = $movies_repo->find($id);
        return $this->render('movie/index.html.twig', [
            'movie' => $movie
        ]);
    }

}
