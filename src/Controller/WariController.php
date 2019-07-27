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
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
     * @Route("/ajout/{id}", name="bloquer", methods={"PUT"})
     */
    public function bloquerPartenaie(Request $request, SerializerInterface $serializer, Partenaires $partenaire, ValidatorInterface $validator, EntityManagerInterface $entityManager)
    {
        $bloqueP = $entityManager->getRepository(Partenaires::class)->find($partenaire->getId());
        $data = json_decode($request->getContent());
        foreach ($data as $key => $value){
            if($key && !empty($value)) {
                $name = ucfirst($key);
                $setter = 'set'.$name;
                $bloqueP->$setter($value);
            }
        }
        $errors = $validator->validate($bloqueP);
        if(count($errors)) {
            $errors = $serializer->serialize($errors, 'json');
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }
        $entityManager->flush();
        $data = [
            'status' => 200,
            'message' => 'L \'etat du partenaire a bien été mis à jour'
        ];
        return new JsonResponse($data);
    }

    /**
     * @Route("/comptB", name="comptB", methods={"POST"})
     */
    public function compte(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
      $partenaire = $serializer->deserialize($request->getContent(), CompteBancaire::class, 'json'); 
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



}
