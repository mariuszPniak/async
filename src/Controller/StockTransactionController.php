<?php

namespace App\Controller;

use App\Message\PurschaseConfirmationNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class StockTransactionController extends AbstractController
{
    #[Route('/buy', name: 'buy-stock')]
    public function buy(MessageBusInterface $bus): Response
    {
        $order = new class {
            public function getBuyer(): object
            {
                return new class {
                    public function getEmail(): string
                    {
                        return 'test@gmail.com';
                    }
                };
            }
        };

        $bus->dispatch(new PurschaseConfirmationNotification($order));

        return $this->render('stocks/example.html.twig');
    }
}
