<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/api/v1/login", name="api_user_login", methods={"POST"})
     */
    public function login(Request $request)
    {
        //TODO

        return new JsonResponse(['message' => 'Ok'], Response::HTTP_OK);
    }

    /**
     * @Route("/api/v1/register", name="api_user_register", methods={"POST"})
     */
    public function register(Request $request)
    {
        //TODO

        return new JsonResponse(['message' => 'Ok'], Response::HTTP_OK);
    }
}
