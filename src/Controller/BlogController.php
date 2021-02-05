<?php

namespace App\Controller;

use App\Entity\Recette;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @return Response
     */
    public function index(): Response{

        $repo = $this->getDoctrine()->getRepository(Recette::class);
        $recettes = $repo->findAll();

        return $this->render('blog/blog.html.twig', [
            'user' => $this->getUser(),
            'recettes' => $recettes
        ]);
    }
}
