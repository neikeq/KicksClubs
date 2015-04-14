<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Levels
 */
class Levels
{
    /**
     * @var integer
     */
    private $experience;

    /**
     * @var integer
     */
    private $level;


    /**
     * Set experience
     *
     * @param integer $experience
     * @return Levels
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }
}
