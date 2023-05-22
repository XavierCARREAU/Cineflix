<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MoviesRepository;


class SheetController extends AbstractController
{
    #[Route('/fiche/{id}', name: 'app_sheet')]
    public function index($id , MoviesRepository $repository): Response
    {
        $sheet = $repository->find($id);
        return $this->render('sheet/index.html.twig', [
            'sheet' => $sheet
        ]);
    }

}
