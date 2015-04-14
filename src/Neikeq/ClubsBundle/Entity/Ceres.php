<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ceres
 */
class Ceres
{
    /**
     * @var integer
     */
    private $inventoryId;

    /**
     * @var integer
     */
    private $cereId;

    /**
     * @var integer
     */
    private $expiration;

    /**
     * @var boolean
     */
    private $selectionIndex;

    /**
     * @var \DateTime
     */
    private $timestampExpire;

    /**
     * @var integer
     */
    private $visible;

    /**
     * @var integer
     */
    private $playerId;


    /**
     * Set inventoryId
     *
     * @param integer $inventoryId
     * @return Ceres
     */
    public function setInventoryId($inventoryId)
    {
        $this->inventoryId = $inventoryId;

        return $this;
    }

    /**
     * Get inventoryId
     *
     * @return integer 
     */
    public function getInventoryId()
    {
        return $this->inventoryId;
    }

    /**
     * Set cereId
     *
     * @param integer $cereId
     * @return Ceres
     */
    public function setCereId($cereId)
    {
        $this->cereId = $cereId;

        return $this;
    }

    /**
     * Get cereId
     *
     * @return integer 
     */
    public function getCereId()
    {
        return $this->cereId;
    }

    /**
     * Set expiration
     *
     * @param integer $expiration
     * @return Ceres
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * Get expiration
     *
     * @return integer 
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set selectionIndex
     *
     * @param boolean $selectionIndex
     * @return Ceres
     */
    public function setSelectionIndex($selectionIndex)
    {
        $this->selectionIndex = $selectionIndex;

        return $this;
    }

    /**
     * Get selectionIndex
     *
     * @return boolean 
     */
    public function getSelectionIndex()
    {
        return $this->selectionIndex;
    }

    /**
     * Set timestampExpire
     *
     * @param \DateTime $timestampExpire
     * @return Ceres
     */
    public function setTimestampExpire($timestampExpire)
    {
        $this->timestampExpire = $timestampExpire;

        return $this;
    }

    /**
     * Get timestampExpire
     *
     * @return \DateTime 
     */
    public function getTimestampExpire()
    {
        return $this->timestampExpire;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return Ceres
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return integer 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Get playerId
     *
     * @return integer 
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }
}
