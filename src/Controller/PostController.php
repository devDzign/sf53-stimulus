<?php

namespace App\Controller;

use App\Form\PostContentType;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     */
    public function index(): Response
    {
        $form = $this->createForm(PostType::class);

        return $this->render('post/index.html.twig', [
            'form' => $form->createView(),
            'urlApi'=> $this->generateUrl("api_posts_post_collection")
        ]);

    }

    /**
     * @Route("/api/form", name="post_form")
     */
    public function getForm(): Response
    {
        $form = $this->createForm(PostContentType::class);
        return new Response($this->renderView('post/form.html.twig', [
            'form'=> $form->createView()
        ]));

    }
}
