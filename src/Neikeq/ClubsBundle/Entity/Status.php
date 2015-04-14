<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 */
class Status
{
    /**
     * @var integer
     */
    private $onlineUsers;


    /**
     * Get onlineUsers
     *
     * @return integer 
     */
    public function getOnlineUsers()
    {
        return $this->onlineUsers;
    }
}
