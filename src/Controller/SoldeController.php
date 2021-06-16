<?php

namespace App\Controller;

use App\Entity\Solde;
use App\Form\SoldeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SoldeController extends AbstractController
{
    /**
     * @Route("/solde", name="solde")
     */
    public function index(): Response
    {
        $solde = new Solde();
        $form = $this->createForm(SoldeType::class, $solde);
        return $this->render('solde/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'SoldeController',
        ]);
    }

    /**
     * @Route("/solde/recordOK", name="recordOK")
     */
    public function recordOK(): Response
    {
        return new Response();
    }

    /**
     * @Route("solde/data2", name="solde_data2")
     */
    public function data2(){
        $solde = new Solde();
        $form = $this->createForm(SoldeType::class, $solde);
        return $this->render('solde/formPart.html.twig', [
            'form' => $form->createView(),
            'inputToRender' => 'data2',
        ]);
}
}
