<?php
namespace App\Controller;

use App\Repository\VideoGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_init')]
    public function init(VideoGameRepository $videoGameRepository): Response
    {
        $form = $this->createFormBuilder()
        ->add('add_video_game', SubmitType::class)
        ->getForm();

        $videoGames = $videoGameRepository->findAll();

        return $this->render('home.html.twig', [
            'videoGames' => $videoGames,
            'form' => $form->createView()
        ]);
    }
}