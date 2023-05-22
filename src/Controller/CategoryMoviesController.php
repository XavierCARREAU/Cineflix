<?php

namespace App\Controller;

use App\Repository\MoviesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryMoviesController extends AbstractController
{
    #[Route('/categorie/movies', name: 'app_category_movies')]
    public function index(MoviesRepository $repository): Response
    {
        $movies = $repository->findAll();
        return $this->render('category_movies/index.html.twig', [
            'movies' => $movies
        ]);
    }
}