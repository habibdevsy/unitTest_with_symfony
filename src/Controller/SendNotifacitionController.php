<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Message\ChatMessage;
class SendNotifacitionController extends AbstractController
{

    /**
     * @Route("/checkout/thankyou")
     */
    public function thankyou(ChatterInterface $chatter)
    {
        $message = (new ChatMessage('You got a new invoice for 15 EUR.'))
            // if not set explicitly, the message is send to the
            // default transport (the first one configured)
            ->transport('telegram');

        $chatter->send($message);

    }


    /**
     * @Route("/send/notifacition", name="send_notifacition")
     */
    public function index()
    {
        return $this->render('send_notifacition/index.html.twig', [
            'controller_name' => 'SendNotifacitionController',
        ]);
    }
}
