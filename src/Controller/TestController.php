<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    #[Route('/')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('test.html.twig', [
            'number' => $number,
        ]);
    }
}