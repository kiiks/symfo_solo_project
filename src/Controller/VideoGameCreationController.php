<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoGameCreationController extends AbstractController
{
    #[Route('/videogame/creation', name: 'video_game_creation')]
    public function index(): Response
    {
        return $this->render('video_game_creation/index.html.twig', [
            'controller_name' => 'VideoGameCreationController',
        ]);
    }
}
