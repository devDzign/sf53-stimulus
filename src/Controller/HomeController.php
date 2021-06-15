<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(PostRepository $postRepository, Request $request): Response
    {

        $searchTerm = $request->query->get('q');
        $posts = $postRepository->findAll();
        return $this->render('home/index.html.twig', [
            'posts' => $posts,
            'searchTerm'=> $searchTerm
        ]);
    }
}
