<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servers
 */
class Servers
{
    /**
     * @var integer
     */
    private $filter;

    /**
     * @var integer
     */
    private $port;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $minLevel;

    /**
     * @var boolean
     */
    private $maxLevel;

    /**
     * @var integer
     */
    private $maxUsers;

    /**
     * @var integer
     */
    private $connectedUsers;

    /**
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $expFactor;

    /**
     * @var integer
     */
    private $pointFactor;

    /**
     * @var integer
     */
    private $kashFactor;

    /**
     * @var integer
     */
    private $practiceRewards;

    /**
     * @var integer
     */
    private $online;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set filter
     *
     * @param integer $filter
     * @return Servers
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return integer 
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Set port
     *
     * @param integer $port
     * @return Servers
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return integer 
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Servers
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Servers
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set minLevel
     *
     * @param boolean $minLevel
     * @return Servers
     */
    public function setMinLevel($minLevel)
    {
        $this->minLevel = $minLevel;

        return $this;
    }

    /**
     * Get minLevel
     *
     * @return boolean 
     */
    public function getMinLevel()
    {
        return $this->minLevel;
    }

    /**
     * Set maxLevel
     *
     * @param boolean $maxLevel
     * @return Servers
     */
    public function setMaxLevel($maxLevel)
    {
        $this->maxLevel = $maxLevel;

        return $this;
    }

    /**
     * Get maxLevel
     *
     * @return boolean 
     */
    public function getMaxLevel()
    {
        return $this->maxLevel;
    }

    /**
     * Set maxUsers
     *
     * @param integer $maxUsers
     * @return Servers
     */
    public function setMaxUsers($maxUsers)
    {
        $this->maxUsers = $maxUsers;

        return $this;
    }

    /**
     * Get maxUsers
     *
     * @return integer 
     */
    public function getMaxUsers()
    {
        return $this->maxUsers;
    }

    /**
     * Set connectedUsers
     *
     * @param integer $connectedUsers
     * @return Servers
     */
    public function setConnectedUsers($connectedUsers)
    {
        $this->connectedUsers = $connectedUsers;

        return $this;
    }

    /**
     * Get connectedUsers
     *
     * @return integer 
     */
    public function getConnectedUsers()
    {
        return $this->connectedUsers;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Servers
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set expFactor
     *
     * @param integer $expFactor
     * @return Servers
     */
    public function setExpFactor($expFactor)
    {
        $this->expFactor = $expFactor;

        return $this;
    }

    /**
     * Get expFactor
     *
     * @return integer 
     */
    public function getExpFactor()
    {
        return $this->expFactor;
    }

    /**
     * Set pointFactor
     *
     * @param integer $pointFactor
     * @return Servers
     */
    public function setPointFactor($pointFactor)
    {
        $this->pointFactor = $pointFactor;

        return $this;
    }

    /**
     * Get pointFactor
     *
     * @return integer 
     */
    public function getPointFactor()
    {
        return $this->pointFactor;
    }

    /**
     * Set kashFactor
     *
     * @param integer $kashFactor
     * @return Servers
     */
    public function setKashFactor($kashFactor)
    {
        $this->kashFactor = $kashFactor;

        return $this;
    }

    /**
     * Get kashFactor
     *
     * @return integer 
     */
    public function getKashFactor()
    {
        return $this->kashFactor;
    }

    /**
     * Set practiceRewards
     *
     * @param integer $practiceRewards
     * @return Servers
     */
    public function setPracticeRewards($practiceRewards)
    {
        $this->practiceRewards = $practiceRewards;

        return $this;
    }

    /**
     * Get practiceRewards
     *
     * @return integer 
     */
    public function getPracticeRewards()
    {
        return $this->practiceRewards;
    }

    /**
     * Set online
     *
     * @param integer $online
     * @return Servers
     */
    public function setOnline($online)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return integer 
     */
    public function getOnline()
    {
        return $this->online;
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
