<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blacklist
 */
class Blacklist
{
    /**
     * @var string
     */
    private $remoteAddress;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $expire;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set remoteAddress
     *
     * @param string $remoteAddress
     * @return Blacklist
     */
    public function setRemoteAddress($remoteAddress)
    {
        $this->remoteAddress = $remoteAddress;

        return $this;
    }

    /**
     * Get remoteAddress
     *
     * @return string 
     */
    public function getRemoteAddress()
    {
        return $this->remoteAddress;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Blacklist
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set expire
     *
     * @param \DateTime $expire
     * @return Blacklist
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * Get expire
     *
     * @return \DateTime 
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set reason
     *
     * @param string $reason
     * @return Blacklist
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
