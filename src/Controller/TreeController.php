<?php

namespace App\Controller;

use App\Form\TreeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TreeController extends AbstractController
{
    /**
     * @Route("/", name="tree", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('tree/index.html.twig');
    }

    /**
     * @Route("/tree", name="tree-save", methods={"POST"})
     */
    public function save(Request $request): JsonResponse
    {
        $form = $this->createForm(TreeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            return $this->json($data);
        }

        return $this->json($form->getErrors());
    }
}
