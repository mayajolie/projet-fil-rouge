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
    public function AjoutP(Request $request, EntityManagerInterface $entityManager)
    {
        $values = json_decode($request->getContent());
        if(isset($values->raisonSocial,$values->ninea,$values->adresse,$values->telephone)) {
            $partenaire = new Partenaires();
            $partenaire->setRaisonSocial($values->raisonSocial);
            $partenaire->setNinea($values->ninea);
            $partenaire->setAdresse($values->adresse);
            $partenaire->setTelephone($values->telephone);
            
            
            $entityManager->persist($partenaire);
            $entityManager->flush();
            
            $data = [
               
                'status' => 201,
                'message' => 'L\'utilisateur a été créé'
            ];

            return new JsonResponse($data, 201);
        }
        $data =[
            'status' => 500,
            'message' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);
    }
}
