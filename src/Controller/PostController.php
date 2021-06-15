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
            'url'=> $this->generateUrl("api_posts_post_collection"),
            "depends"=> [
                [
                    "url"=>$this->generateUrl("post_form"),
                    "field"=> 'name'
                ],
                [
                    "url"=>$this->generateUrl("post_form2"),
                    "field"=> 'name'
                ]
            ]
        ]);

    }

    /**
     * @Route("/api/form", name="post_form")
     */
    public function getForm(): Response
    {
        return new Response($this->renderView('post/form.html.twig'));

    }

    /**
     * @Route("/api/form2", name="post_form2")
     */
    public function getForm2(): Response
    {
        return new Response($this->renderView('post/form2.html.twig'));

    }
}
