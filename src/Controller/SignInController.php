<?php

namespace App\Controller;

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
        return $this->redirectToRoute('app_dashboard');
    }
}
