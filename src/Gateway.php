<?php

namespace Omnipay\Paysera;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    /**
     * Version of API.
     */
    const VERSION = '1.6';

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Paysera';
    }

    /**
     * @inheritDoc
     */
    public function getDefaultParameters()
    {
        return [
            'testMode' => true,
            'version' => self::VERSION,
        ];
    }

    /**
     * Get the Project ID.
     *
     * @return string
     */
    public function getProjectId()
    {
        return $this->getParameter('projectId');
    }

    /**
     * Set the Project ID.
     *
     * @param  string  $value
     * @return $this
     */
    public function setProjectId($value)
    {
        return $this->setParameter('projectId', $value);
    }

    /**
     * Get the password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->getParameter('password');
    }

    /**
     * Set the password.
     *
     * @param  string  $value
     * @return $this
     */
    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    /**
     * Get the API version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->getParameter('version');
    }

    /**
     * Set the API version.
     *
     * @param  string  $value
     * @return $this
     */
    public function setVersion($value)
    {
        return $this->setParameter('version', $value);
    }

    /**
     * @inheritDoc
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest('\Omnipay\Paysera\Message\PurchaseRequest', $options);
    }

    /**
     * @inheritDoc
     */
    public function acceptNotification(array $options = [])
    {
        return $this->createRequest('\Omnipay\Paysera\Message\AcceptNotificationRequest', $options);
    }
}
