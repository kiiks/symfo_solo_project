<?php

namespace App\Controller;

use App\Entity\GameCategory;
use App\Form\GameCategoryCreationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameCategoryCreationController extends AbstractController
{
    #[Route('/category/creation', name: 'game_category_creation')]
    public function index(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $entityManager = $managerRegistry->getManager();
        $gameCategory = new GameCategory();

        $form = $this->createForm(GameCategoryCreationType::class, $gameCategory);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $gameCategory = $form->getData();
            $entityManager->persist($gameCategory);
            $entityManager->flush();
            $this->redirect('home_init');
        }

        return $this->render('game_category_creation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
