<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api")
 */

class SecurityController extends AbstractController
{
    
    /**
     * @Route("/register", name="register", methods={"POST"})
     *  @
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder,SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
            
        $values = json_decode($request->getContent());
            $user = new User();
            $user->setUsername($values->username);
            $user->setPassword($passwordEncoder->encodePassword($user, $values->password));
            $user->setRoles(['ROLE_ADMIN_PART']);
            $user->setNom($values->nom);
            $user->setPrenom($values->prenom);
            $user->setTelephone($values->telephone);
            $user->setAdresse($values->adresse);
            $user->setEmail($values->email);
            $user->setEtat($values->etat);


            $entityManager->persist($user);
            $entityManager->flush();

            $data = [
        
                'status' => 201,
                'message' => 'L\'utilisateur a été créé'
            ];

            return new JsonResponse($data, 201);
    }
      /**
     * @Route("/loginchek", name="login", methods={"POST","GET"})
     */
    public function login(Request $request)
    {
        $user = $this->getUser();
        return $this->json([
            'username' => $user->getUsername(),
            'roles' => $user->getRoles()
        ]);
    } 
}
