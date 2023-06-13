<?php

namespace App\MessageHandler;

use App\Entity\Message;
use App\Message\SimpleMessage;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SimpleMessageHandler implements MessageHandlerInterface
{
    public function __construct
    (
        protected ManagerRegistry $managerRegistry
    )
    {
    }

    public function __invoke(SimpleMessage $message)
    {
        $content = $message->getContent();

        $doctrine = $this->managerRegistry->getManager();
        $message = (new Message())
            ->setContent($content);
        $doctrine->persist($message);
        $doctrine->flush();
    }
}