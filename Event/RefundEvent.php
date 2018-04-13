<?php

namespace Troopers\MangopayBundle\Event;

use MangoPay\Refund;
use Symfony\Component\EventDispatcher\Event;

class RefundEvent extends Event
{
    private $refund;

    public function __construct(Refund $refund)
    {
        $this->refund = $refund;
    }

    /**
     * Get refund.
     *
     * @return string
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * Set refund.
     *
     * @param string $refund
     *
     * @return $this
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;

        return $this;
    }
}
