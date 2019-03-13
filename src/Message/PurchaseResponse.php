<?php

namespace Omnipay\Paysera\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Get the API endpoint.
     *
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://www.paysera.com/pay/';
    }

    /**
     * @inheritDoc
     */
    public function getRedirectUrl()
    {
        return $this->getEndpoint();
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * @inheritDoc
     */
    public function getRedirectData()
    {
        return $this->getData();
    }
}
