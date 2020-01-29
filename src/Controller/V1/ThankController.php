<?php

namespace App\Controller\V1;

use App\Entity\Thank;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ThankController extends AbstractController
{
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Thank::class);
        $thanks = $repository->findAll();
        return new JsonResponse(['data' => $thanks]);
    }

    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Thank::class);
        $thank = $repository->find($id);
        return new JsonResponse(['data' => $thank]);
    }

    public function create(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $thank = new Thank();
        $request->query->get('text');

        $thank->setText($request->query->get('text'));

        $entityManager->persist($thank);
        $entityManager->flush();

        return new JsonResponse(['data' => $thank->getText()]);
    }
}
