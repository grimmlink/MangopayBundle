<?php

namespace Troopers\MangopayBundle\Helper;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use MangoPay\CardRegistration;
use MangoPay\User;
use Troopers\MangopayBundle\Event\CardRegistrationEvent;
use Troopers\MangopayBundle\TroopersMangopayEvents;

/**
 * ref: troopers_mangopay.card_registration_helper.
 **/
class CardRegistrationHelper
{
    private $mangopayHelper;
    private $entityManager;
    private $dispatcher;

    public function __construct(MangopayHelper $mangopayHelper, EntityManager $entityManager, EventDispatcherInterface $dispatcher)
    {
        $this->mangopayHelper = $mangopayHelper;
        $this->entityManager = $entityManager;
        $this->dispatcher = $dispatcher;
    }

    public function createCardRegistrationForUser(User $user, $currency = 'EUR')
    {
        $cardRegistration = new CardRegistration();
        $cardRegistration->UserId = $user->Id;
        $cardRegistration->Currency = $currency;

        $cardRegistration = $this->mangopayHelper->CardRegistrations->Create($cardRegistration);

        $event = new CardRegistrationEvent($cardRegistration);
        $this->dispatcher->dispatch(TroopersMangopayEvents::NEW_CARD_REGISTRATION, $event);

        return $cardRegistration;
    }
}
