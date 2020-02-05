<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Security;
use App\Repository\UserRepository;

class SecurityController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/api/login", name="app_login", methods={"POST", "OPTIONS", "GET"} )
     */
    public function logins(AuthenticationUtils $authenticationUtils, Request $request): JsonResponse
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->json(['user' => [
                'username' => $lastUsername,
                'error' => (null !== $error) ? $error->getMessage() : null,
                'apiToken' => (null === $error) ? $request->getSession()->get('security.token_storage')->getUser()->getApiToken() : null
            ]
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): JsonResponse
    {
        return $this->json(['logout' => true]);
    }
}
