<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Partenaires;
use App\Entity\CompteBancaire;
use App\Form\ComptBType;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
<<<<<<< HEAD
=======
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
>>>>>>> f201ad2db582ca97231a114be0573dcab8420e7a

/**
 * @Route("/api")
 */
class WariController extends FOSRestController
{
    /**
     * @Rest\Get("/partenaires", name="find_partenaires")
      * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Partenaires::class);
        $partenaire = $repo->findAll();

        return $this->handleView($this->view($partenaire));
    }

<<<<<<< HEAD
    /**
     * @Route("/ajout", name="ajout", methods="POST")
     */
    public function ajoutP(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $partenaire = $serializer->deserialize($request->getContent(), Partenaires::class, 'json');
        $entityManager->persist($partenaire);
        $entityManager->flush();

        $data = [
                'statu' => 201,
                'message' => 'L\'utilisateur a été créé',
            ];

        return new JsonResponse($data, 201);

        $data = [
            'status' => 500,
            'message' => 'Vous devez renseigner les clés username et password',
=======
            }
    /**
     * @Route("/ajout", name="ajout", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
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
            'statu' => 500,
            'message' => 'Vous devez renseigner les clés username et password'
>>>>>>> f201ad2db582ca97231a114be0573dcab8420e7a
        ];

        return new JsonResponse($data, 500);
    }

    /**
     * @Route("/ajout/{id}", name="bloquer", methods={"PUT"})
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */     
    public function bloquerPartenaie(Request $request, SerializerInterface $serializer, Partenaires $partenaire, ValidatorInterface $validator, EntityManagerInterface $entityManager)
    {
        $bloqueP = $entityManager->getRepository(Partenaires::class)->find($partenaire->getId());
        $data = json_decode($request->getContent());
        foreach ($data as $key => $value) {
            if ($key && !empty($value)) {
                $name = ucfirst($key);
                $setter = 'set'.$name;
                $bloqueP->$setter($value);
            }
        }
        $errors = $validator->validate($bloqueP);
        if (count($errors)) {
            $errors = $serializer->serialize($errors, 'json');

            return new Response($errors, 500, [
                'Content-Type' => 'application/json',
            ]);
        }
        $entityManager->flush();
        $data = [
            'status' => 200,
            'message' => 'L \'etat du partenaire a bien été mis à jour',
        ];

        return new JsonResponse($data);
    }

    /**
     * @Route("/comptB", name="comptB", methods={"POST"})
     * * @IsGranted("ROLE_SUPER_ADMIN")

     */
    public function ajoutComptB(Request $request)
    {
        $compb = new CompteBancaire();
        $form = $this->createform(ComptBType::class, $compb);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

<<<<<<< HEAD
        $em = $this->getDoctrine()->getManager();
        $em->persist($compb);
        $em->flush();
=======
    }

        /**
     * @Route("/depot", name="depot", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function Depot (Request $request,  EntityManagerInterface $entityManager)
    {
        $values = json_decode($request->getContent());
        if(isset($values->montant)) {
            $depot = new Depot();
            $depot->setMontant($values->montant);
            $depot->setDateDepot(new \DateTime());
            //recuperation de l'id du partenaire
            $repo=$this->getDoctrine()->getRepository(CompteBancaire::class);
            $partenaire=$repo->find($values->comptb);
            $depot->setComptb($partenaire);
            //incrementant du solde du partenaire du montant du depot
            $partenaire->setSolde($partenaire->getSolde()+$values->montant);
            //enregistrement au niveau du partenaire
            $entityManager->persist($partenaire);

            //enregistrement au niveau du depot
            $entityManager->persist($depot);
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'Le depot  a été enregistré'
            ];

            return new JsonResponse($data, 201);
        }
        $data = [
            'status' => 500,
            'message' => 'Vous devez renseigner les champs montants et idPartenaire'
        ];
        return new JsonResponse($data, 500);
>>>>>>> f201ad2db582ca97231a114be0573dcab8420e7a

        return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
}
