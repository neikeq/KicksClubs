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
    private $playerId;

    /**
     * @var string
     */
    private $role;

    /**
     * @var integer
     */
    private $backNumber;

    /**
     * Set playerId
     *
     * @param integer $playerId
     * @return ClubMembers
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
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
