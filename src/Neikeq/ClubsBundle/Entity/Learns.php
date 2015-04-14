<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Learns
 */
class Learns
{
    /**
     * @var integer
     */
    private $inventoryId;

    /**
     * @var integer
     */
    private $learnId;

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
     * @return Learns
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
     * Set learnId
     *
     * @param integer $learnId
     * @return Learns
     */
    public function setLearnId($learnId)
    {
        $this->learnId = $learnId;

        return $this;
    }

    /**
     * Get learnId
     *
     * @return integer 
     */
    public function getLearnId()
    {
        return $this->learnId;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return Learns
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
