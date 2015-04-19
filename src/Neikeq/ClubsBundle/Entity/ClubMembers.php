<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ClubMembers
 */
class ClubMembers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $clubId;

    /**
     * @var string
     */
    private $role;

    /**
     * @var integer
     */
    private $backNumber;

    /**
     * Set clubId
     *
     * @param integer $clubId
     * @return ClubMembers
     */
    public function setClubId($clubId)
    {
        $this->clubId = $clubId;

        return $this;
    }

    /**
     * Get clubId
     *
     * @return integer
     */
    public function getClubId()
    {
        return $this->clubId;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return ClubMembers
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set backNumber
     *
     * @param integer $backNumber
     * @return ClubMembers
     */
    public function setBackNumber($backNumber)
    {
        $this->backNumber = $backNumber;

        return $this;
    }

    /**
     * Get backNumber
     *
     * @return integer
     */
    public function getBackNumber()
    {
        return $this->backNumber;
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
