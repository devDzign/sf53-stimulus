<?php

namespace App\Controller;

use App\Form\PostContentType;
use App\Form\PostType;
use App\Model\Calcul;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CalculController extends AbstractController
{
    /**
     * @Route("/calcul", name="calcul")
     */
    public function index(): Response
    {

        return $this->render('calcul/index.html.twig', [
            "depends" => [
                [
                    "url" => $this->generateUrl("post_form"),
                    "dependInput" => "name",
                    "isChanged" => "yes"

                ],
                [
                    "url" => $this->generateUrl("post_form"),
                    "dependInput" => "name",
                    "isChanged" => "no"

                ],
            ]
        ]);

    }


    /**
     * @Route("/calcul_result", name="calcul_result", methods={"POST"})
     */
    public function result(Request $request, SerializerInterface $serializer): Response
    {

        $content = $request->getContent();

        $calculModel =$serializer->deserialize($content, Calcul::class, 'json');


        return $this->json($calculModel->result());

    }


}
