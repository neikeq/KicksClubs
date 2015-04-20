<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clubs
 */
class Clubs
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $clubPoints = 0;

    /**
     * @var string
     */
    private $membershipMode;

    /**
     * @var integer
     */
    private $uniformActive = 0;

    /**
     * @var integer
     */
    private $uniformHomeShirts;

    /**
     * @var integer
     */
    private $uniformHomePants;

    /**
     * @var integer
     */
    private $uniformHomeSocks;

    /**
     * @var integer
     */
    private $uniformHomeWrist;

    /**
     * @var integer
     */
    private $uniformAwayShirts;

    /**
     * @var integer
     */
    private $uniformAwayPants;

    /**
     * @var integer
     */
    private $uniformAwaySocks;

    /**
     * @var integer
     */
    private $uniformAwayWrist;

    /**
     * @var \DateTime
     */
    private $creation;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     * @return Clubs
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
     * Set description
     *
     * @param string $description
     * @return Clubs
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set clubPoints
     *
     * @param integer $clubPoints
     * @return Clubs
     */
    public function setClubPoints($clubPoints)
    {
        $this->clubPoints = $clubPoints;

        return $this;
    }

    /**
     * Get clubPoints
     *
     * @return integer
     */
    public function getClubPoints()
    {
        return $this->clubPoints;
    }

    /**
     * Set membershipMode
     *
     * @param string $membershipMode
     * @return Clubs
     */
    public function setMembershipMode($membershipMode)
    {
        $this->membershipMode = $membershipMode;

        return $this;
    }

    /**
     * Get membershipMode
     *
     * @return string
     */
    public function getMembershipMode()
    {
        return $this->membershipMode;
    }

    /**
     * Set uniformActive
     *
     * @param integer $uniformActive
     * @return Clubs
     */
    public function setUniformActive($uniformActive)
    {
        $this->uniformActive = $uniformActive;

        return $this;
    }

    /**
     * Get uniformActive
     *
     * @return integer
     */
    public function getUniformActive()
    {
        return $this->uniformActive;
    }

    /**
     * Set uniformHomeShirts
     *
     * @param integer $uniformHomeShirts
     * @return Clubs
     */
    public function setUniformHomeShirts($uniformHomeShirts)
    {
        $this->uniformHomeShirts = $uniformHomeShirts;

        return $this;
    }

    /**
     * Get uniformHomeShirts
     *
     * @return integer
     */
    public function getUniformHomeShirts()
    {
        return $this->uniformHomeShirts;
    }

    /**
     * Set uniformHomePants
     *
     * @param integer $uniformHomePants
     * @return Clubs
     */
    public function setUniformHomePants($uniformHomePants)
    {
        $this->uniformHomePants = $uniformHomePants;

        return $this;
    }

    /**
     * Get uniformHomePants
     *
     * @return integer
     */
    public function getUniformHomePants()
    {
        return $this->uniformHomePants;
    }

    /**
     * Set uniformHomeSocks
     *
     * @param integer $uniformHomeSocks
     * @return Clubs
     */
    public function setUniformHomeSocks($uniformHomeSocks)
    {
        $this->uniformHomeSocks = $uniformHomeSocks;

        return $this;
    }

    /**
     * Get uniformHomeSocks
     *
     * @return integer
     */
    public function getUniformHomeSocks()
    {
        return $this->uniformHomeSocks;
    }

    /**
     * Set uniformHomeWrist
     *
     * @param integer $uniformHomeWrist
     * @return Clubs
     */
    public function setUniformHomeWrist($uniformHomeWrist)
    {
        $this->uniformHomeWrist = $uniformHomeWrist;

        return $this;
    }

    /**
     * Get uniformHomeWrist
     *
     * @return integer
     */
    public function getUniformHomeWrist()
    {
        return $this->uniformHomeWrist;
    }

    /**
     * Set uniformAwayShirts
     *
     * @param integer $uniformAwayShirts
     * @return Clubs
     */
    public function setUniformAwayShirts($uniformAwayShirts)
    {
        $this->uniformAwayShirts = $uniformAwayShirts;

        return $this;
    }

    /**
     * Get uniformAwayShirts
     *
     * @return integer
     */
    public function getUniformAwayShirts()
    {
        return $this->uniformAwayShirts;
    }

    /**
     * Set uniformAwayPants
     *
     * @param integer $uniformAwayPants
     * @return Clubs
     */
    public function setUniformAwayPants($uniformAwayPants)
    {
        $this->uniformAwayPants = $uniformAwayPants;

        return $this;
    }

    /**
     * Get uniformAwayPants
     *
     * @return integer
     */
    public function getUniformAwayPants()
    {
        return $this->uniformAwayPants;
    }

    /**
     * Set uniformAwaySocks
     *
     * @param integer $uniformAwaySocks
     * @return Clubs
     */
    public function setUniformAwaySocks($uniformAwaySocks)
    {
        $this->uniformAwaySocks = $uniformAwaySocks;

        return $this;
    }

    /**
     * Get uniformAwaySocks
     *
     * @return integer
     */
    public function getUniformAwaySocks()
    {
        return $this->uniformAwaySocks;
    }

    /**
     * Set uniformAwayWrist
     *
     * @param integer $uniformAwayWrist
     * @return Clubs
     */
    public function setUniformAwayWrist($uniformAwayWrist)
    {
        $this->uniformAwayWrist = $uniformAwayWrist;

        return $this;
    }

    /**
     * Get uniformAwayWrist
     *
     * @return integer
     */
    public function getUniformAwayWrist()
    {
        return $this->uniformAwayWrist;
    }

    /**
     * Set creation
     *
     * @param \DateTime $creation
     * @return Clubs
     */
    public function setCreation($creation)
    {
        $this->creation = $creation;

        return $this;
    }

    /**
     * Get creation
     *
     * @return \DateTime
     */
    public function getCreation()
    {
        return $this->creation;
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
