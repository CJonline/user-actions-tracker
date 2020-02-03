<?php

namespace App\Controller;

use App\Message\UserAction;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class TrackerController extends AbstractController
{
    /**
     * @Route("/api/v1/user/track", name="api_user_track", methods={"POST"})
     */
    public function track(Request $request, MessageBusInterface $messageBus, UserAction $userAction)
    {
        $message = $request->get('message');
        $messageBus->dispatch($userAction->setContent($message));

        return new JsonResponse(['message' => 'Ok'], Response::HTTP_OK);
    }
}
