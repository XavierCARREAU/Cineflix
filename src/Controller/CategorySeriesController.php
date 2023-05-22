<?php

namespace App\Controller;

use App\Repository\MoviesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorySeriesController extends AbstractController
{
    #[Route('/category/series', name: 'app_category_series')]
    public function index(MoviesRepository $repository): Response
    {
        $series = $repository->findAll();
        return $this->render('category_series/index.html.twig', [
            'series' => $series
        ]);
    }
}