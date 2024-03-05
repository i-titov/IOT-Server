<?php

namespace App\Controller;

use App\Document\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SignInController extends AbstractController
{

    #[Route('/signin', name: 'app_sign_in')]
    public function index(): Response
    {
        return $this->render('sign_in/index.html.twig', [
            'controller_name' => 'SignInController',
        ]);
    }

    #[Route('/signin', name: 'app_sign_in_post')]

    public function signIn(Request $request): Response
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        // Retrieve user from MongoDB based on username/email
        $userRepository = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository(Client::class);

        /** @var Client|null $user */
        $user = $userRepository->findOneBy(['username' => $username]);

        // Validate user credentials
        if (!$user || !password_verify($password, $user->getPassword())) {
            // Authentication failed
            return $this->json(['error' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }
        return $this->redirectToRoute('app_dashboard');
    }
}
