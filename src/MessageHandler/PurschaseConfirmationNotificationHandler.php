<?php

namespace App\MessageHandler;

use App\Message\PurschaseConfirmationNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;


class PurschaseConfirmationNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(PurschaseConfirmationNotification $notification)
    {
        echo 'Create a PDF<br>';

        echo 'Emailing contract note to '. $notification->getOrder()->getBuyer()->getEmail().'<br>';
    }
}
