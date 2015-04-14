<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 */
class Items
{
    /**
     * @var integer
     */
    private $inventoryId;

    /**
     * @var integer
     */
    private $itemId;

    /**
     * @var integer
     */
    private $expiration;

    /**
     * @var integer
     */
    private $bonusOne;

    /**
     * @var integer
     */
    private $bonusTwo;

    /**
     * @var integer
     */
    private $usages;

    /**
     * @var \DateTime
     */
    private $timestampExpire;

    /**
     * @var integer
     */
    private $selected;

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
     * @return Items
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
     * Set itemId
     *
     * @param integer $itemId
     * @return Items
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer 
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set expiration
     *
     * @param integer $expiration
     * @return Items
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
     * Set bonusOne
     *
     * @param integer $bonusOne
     * @return Items
     */
    public function setBonusOne($bonusOne)
    {
        $this->bonusOne = $bonusOne;

        return $this;
    }

    /**
     * Get bonusOne
     *
     * @return integer 
     */
    public function getBonusOne()
    {
        return $this->bonusOne;
    }

    /**
     * Set bonusTwo
     *
     * @param integer $bonusTwo
     * @return Items
     */
    public function setBonusTwo($bonusTwo)
    {
        $this->bonusTwo = $bonusTwo;

        return $this;
    }

    /**
     * Get bonusTwo
     *
     * @return integer 
     */
    public function getBonusTwo()
    {
        return $this->bonusTwo;
    }

    /**
     * Set usages
     *
     * @param integer $usages
     * @return Items
     */
    public function setUsages($usages)
    {
        $this->usages = $usages;

        return $this;
    }

    /**
     * Get usages
     *
     * @return integer 
     */
    public function getUsages()
    {
        return $this->usages;
    }

    /**
     * Set timestampExpire
     *
     * @param \DateTime $timestampExpire
     * @return Items
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
     * Set selected
     *
     * @param integer $selected
     * @return Items
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;

        return $this;
    }

    /**
     * Get selected
     *
     * @return integer 
     */
    public function getSelected()
    {
        return $this->selected;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return Items
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
