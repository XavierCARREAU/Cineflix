<?php

namespace App\Controller;

use App\Entity\Playlists;
use App\Form\PlaylistType;
use App\Repository\PlaylistsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaylistController extends AbstractController
{
    #[Route('/playlists', name: 'playlists_index', methods: ['GET'])]
    public function index(PlaylistsRepository $PlaylistsRepository): Response
    {
        $playlists = $PlaylistsRepository->findAll();

        return $this->render('playlist/index.html.twig', [
            'playlists' => $playlists,
        ]);
    }

    #[Route('/playlists/create', name: 'playlists_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $playlist = new Playlist();
    
        $form = $this->createForm(PlaylistType::class, $playlist);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $playlist->setOwner($this->getUser());
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($playlist);
            $entityManager->flush();
    
            return $this->redirectToRoute('playlists_show', ['id' => $playlist->getId()]);
        }
    
        return $this->render('playlist/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/playlists/{id}', name: 'playlists_show', methods: ['GET'])]
    public function show(Playlist $playlist): Response
    {
        return $this->render('playlist/show.html.twig', [
            'playlist' => $playlist,
        ]);
    }

    #[Route('/playlists/{id}/edit', name: 'playlists_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Playlist $playlist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlaylistType::class, $playlist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('playlist/edit.html.twig', [
            'form' => $form->createView(),
            'playlist' => $playlist,
        ]);
    }

    #[Route('/playlists/{id}', name: 'playlists_delete', methods: ['DELETE'])]
    public function delete(Request $request, Playlist $playlist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $playlist->getId(), $request->request->get('_token'))) {
            $entityManager->remove($playlist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_home');
    }
}
