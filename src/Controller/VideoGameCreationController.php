<?php

namespace App\Controller;

use App\Entity\VideoGame;
use App\Form\VideoGameType;
use App\Repository\GameCategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoGameCreationController extends AbstractController
{
    #[Route('/videogame/creation', name: 'video_game_creation')]
    public function index(Request $request, GameCategoryRepository $gameCategoryRepository, ManagerRegistry $managerRegistry): Response
    {
        $entityManager = $managerRegistry->getManager();
        $categories = $gameCategoryRepository->findAll();
        $videoGame = new VideoGame();

        $form = $this->createForm(VideoGameType::class, $videoGame, ['attr' => $categories]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $videoGame = $form->getData();
            $entityManager->persist($videoGame);
            $entityManager->flush();
            $this->redirect('home_init');
        }

        return $this->render('video_game_creation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
