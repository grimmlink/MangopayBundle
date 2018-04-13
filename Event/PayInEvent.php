<?php

namespace Troopers\MangopayBundle\Event;

use MangoPay\PayIn;
use Symfony\Component\EventDispatcher\Event;

class PayInEvent extends Event
{
    private $payIn;

    public function __construct(PayIn $payIn)
    {
        $this->payIn = $payIn;
    }

    /**
     * Get payin.
     *
     * @return string
     */
    public function getPayin()
    {
        return $this->payIn;
    }

    /**
     * Set payin.
     *
     * @param string $payin
     *
     * @return $this
     */
    public function setPayin($payin)
    {
        $this->payIn = $payin;

        return $this;
    }
}
