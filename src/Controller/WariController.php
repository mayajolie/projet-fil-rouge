<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Partenaires;
use App\Form\PartenaireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use AppBundle\Form\Type\PlaceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 */
class WariController extends FOSRestController
{
    /**
     * @Rest\Get("/partenaires", name="find_partenaires")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Partenaires::class);
        $partenaire = $repo->findAll();

        return $this->handleView($this->view($partenaire));
    }
    
     /**
     * @Route("/partenaire", name="add_partenaire", methods={"POST"})
     */
    public function addPartenaire(Request $request, SerializerInterface $serializer, EntityManagerInterface $menager)
    {
        $partenaire = $serializer->deserialize($request->getContent(), Partenaires::class, 'json');
        $menager->persist($partenaire);
        $menager->flush();
        $data = [
            'status' => 201,
            'message' => 'Le partenaire a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }
}
