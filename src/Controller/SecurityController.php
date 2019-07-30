<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Partenaires;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register", methods={"POST"})
     * @IsGranted("ROLE_ADMIN_PART")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $values = json_decode($request->getContent());
        if (isset($values->username, $values->password)) {
            $user = new User();
            $user->setUsername($values->username);
            $user->setPassword($passwordEncoder->encodePassword($user, $values->password));
            $user->setRoles(['ROLE_UTLISATEUR']);
            $user->setNom($values->nom);
            $user->setPrenom($values->prenom);
            $user->setAdresse($values->adresse);
            $user->setTelephone($values->telephone);
            $user->setEmail($values->email);
            $user->setEtat($values->etat);
            $repo = $this->getDoctrine()->getRepository(Partenaires::class);
            $partenaire = $repo->find($values->id_partenaire);
            $user->setIdPartenaire($partenaire);

            $entityManager->persist($user);
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'L\'utilisateur a été créé',
            ];

            return new JsonResponse($data, 201);
        }
        $data = [
            'status' => 500,
            'message' => 'Vous devez renseigner les clés username et password',
        ];

        return new JsonResponse($data, 500);
    }

    /**
     * @Route("/loginchek", name="login", methods={"POST","GET"})
     */
    public function login(Request $request)
    {
        $user = $this->getUser();

        return $this->json([
            'username' => $user->getUsername(),
            'roles' => $user->getRoles(),
        ]);
    }
}
