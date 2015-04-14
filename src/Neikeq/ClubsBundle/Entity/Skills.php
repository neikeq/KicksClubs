<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skills
 */
class Skills
{
    /**
     * @var integer
     */
    private $inventoryId;

    /**
     * @var integer
     */
    private $skillId;

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
     * @return Skills
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
     * Set skillId
     *
     * @param integer $skillId
     * @return Skills
     */
    public function setSkillId($skillId)
    {
        $this->skillId = $skillId;

        return $this;
    }

    /**
     * Get skillId
     *
     * @return integer 
     */
    public function getSkillId()
    {
        return $this->skillId;
    }

    /**
     * Set expiration
     *
     * @param integer $expiration
     * @return Skills
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
     * @return Skills
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
     * @return Skills
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
     * @return Skills
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
