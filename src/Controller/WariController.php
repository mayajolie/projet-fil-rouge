<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Partenaires;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 */
class WariController extends FOSRestController
{
  /**
     * @Route("/partenaires", name="partenaires", methods={"GET"})
     */
    public function patenaires()
    {
        $repo = $this->getDoctrine()->getRepository(Partenaires::class);
        $partenaire = $repo->findAll();
        return $this->handleView($this->view($partenaire));

            }
      /**
     * @Route("/ajout", name="ajout", methods={"POST"})
     */
        public function AjoutP(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
        {
          $partenaire = $serializer->deserialize($request->getContent(), Partenaires::class, 'json');
            
            
            $entityManager->persist($partenaire);
            $entityManager->flush();
            
            $data = [
               
                'status' => 201,
                'message' => 'L\'utilisateur a été créé'
            ];

            return new JsonResponse($data, 201);
        
        $data =[
            'status' => 500,
            'message' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);
    }

    /**
     * @Route("/bloquer", name="aj", methods={"POST"})
     */
public function update($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $etat = $entityManager->getRepository(Partenaires::class)->find($id);

    if (!$etat) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $etat->setEtat('debloquer');
    $entityManager->flush();

}

}
