<?php

namespace App\Controller;

use App\Message\SimpleMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('message', name: 'message')]
    public function produceMessage(MessageBusInterface $bus) : Response
    {
        $message = new SimpleMessage('Simple Message Controller');
        $bus->dispatch($message);

        return new Response('Send Message');
    }
}