<?php
namespace App\Controller;

use App\Repository\VideoGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_init')]
    public function init(Request $request, VideoGameRepository $videoGameRepository): Response
    {
        $form = $this->createFormBuilder()
        ->add('add_video_game', SubmitType::class)
        ->add('add_game_category', SubmitType::class)
        ->add('add_review', SubmitType::class)
        ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->getClickedButton() && 'add_video_game' === $form->getClickedButton()->getName()) {
                return $this->redirectToRoute('video_game_creation');
            }
    
            if ($form->getClickedButton() && 'add_game_category' === $form->getClickedButton()->getName()) {
                return $this->redirectToRoute('game_category_creation');
            }

            if ($form->getClickedButton() && 'add_review' === $form->getClickedButton()->getName()) {
                return $this->redirectToRoute('review_creation');
            }
        }

        $videoGames = $videoGameRepository->findAll();

        return $this->render('home.html.twig', [
            'videoGames' => $videoGames,
            'form' => $form->createView()
        ]);
    }
}