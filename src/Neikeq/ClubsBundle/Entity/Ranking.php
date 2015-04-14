<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ranking
 */
class Ranking
{
    /**
     * @var integer
     */
    private $matches;

    /**
     * @var integer
     */
    private $wins;

    /**
     * @var integer
     */
    private $draws;

    /**
     * @var integer
     */
    private $points;

    /**
     * @var integer
     */
    private $mom;

    /**
     * @var integer
     */
    private $validGoals;

    /**
     * @var integer
     */
    private $validAssists;

    /**
     * @var integer
     */
    private $validInterception;

    /**
     * @var integer
     */
    private $validShooting;

    /**
     * @var integer
     */
    private $validStealing;

    /**
     * @var integer
     */
    private $validTackling;

    /**
     * @var integer
     */
    private $shooting;

    /**
     * @var integer
     */
    private $stealing;

    /**
     * @var integer
     */
    private $tackling;

    /**
     * @var integer
     */
    private $totalPoints;

    /**
     * @var integer
     */
    private $monthMatches;

    /**
     * @var integer
     */
    private $monthWins;

    /**
     * @var integer
     */
    private $monthDraws;

    /**
     * @var integer
     */
    private $monthPoints;

    /**
     * @var integer
     */
    private $monthMom;

    /**
     * @var integer
     */
    private $monthValidGoals;

    /**
     * @var integer
     */
    private $monthValidAssists;

    /**
     * @var integer
     */
    private $monthValidInterception;

    /**
     * @var integer
     */
    private $monthValidShooting;

    /**
     * @var integer
     */
    private $monthValidStealing;

    /**
     * @var integer
     */
    private $monthValidTackling;

    /**
     * @var integer
     */
    private $monthShooting;

    /**
     * @var integer
     */
    private $monthStealing;

    /**
     * @var integer
     */
    private $monthTackling;

    /**
     * @var integer
     */
    private $monthTotalPoints;

    /**
     * @var integer
     */
    private $index;


    /**
     * Set matches
     *
     * @param integer $matches
     * @return Ranking
     */
    public function setMatches($matches)
    {
        $this->matches = $matches;

        return $this;
    }

    /**
     * Get matches
     *
     * @return integer 
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Set wins
     *
     * @param integer $wins
     * @return Ranking
     */
    public function setWins($wins)
    {
        $this->wins = $wins;

        return $this;
    }

    /**
     * Get wins
     *
     * @return integer 
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Set draws
     *
     * @param integer $draws
     * @return Ranking
     */
    public function setDraws($draws)
    {
        $this->draws = $draws;

        return $this;
    }

    /**
     * Get draws
     *
     * @return integer 
     */
    public function getDraws()
    {
        return $this->draws;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Ranking
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set mom
     *
     * @param integer $mom
     * @return Ranking
     */
    public function setMom($mom)
    {
        $this->mom = $mom;

        return $this;
    }

    /**
     * Get mom
     *
     * @return integer 
     */
    public function getMom()
    {
        return $this->mom;
    }

    /**
     * Set validGoals
     *
     * @param integer $validGoals
     * @return Ranking
     */
    public function setValidGoals($validGoals)
    {
        $this->validGoals = $validGoals;

        return $this;
    }

    /**
     * Get validGoals
     *
     * @return integer 
     */
    public function getValidGoals()
    {
        return $this->validGoals;
    }

    /**
     * Set validAssists
     *
     * @param integer $validAssists
     * @return Ranking
     */
    public function setValidAssists($validAssists)
    {
        $this->validAssists = $validAssists;

        return $this;
    }

    /**
     * Get validAssists
     *
     * @return integer 
     */
    public function getValidAssists()
    {
        return $this->validAssists;
    }

    /**
     * Set validInterception
     *
     * @param integer $validInterception
     * @return Ranking
     */
    public function setValidInterception($validInterception)
    {
        $this->validInterception = $validInterception;

        return $this;
    }

    /**
     * Get validInterception
     *
     * @return integer 
     */
    public function getValidInterception()
    {
        return $this->validInterception;
    }

    /**
     * Set validShooting
     *
     * @param integer $validShooting
     * @return Ranking
     */
    public function setValidShooting($validShooting)
    {
        $this->validShooting = $validShooting;

        return $this;
    }

    /**
     * Get validShooting
     *
     * @return integer 
     */
    public function getValidShooting()
    {
        return $this->validShooting;
    }

    /**
     * Set validStealing
     *
     * @param integer $validStealing
     * @return Ranking
     */
    public function setValidStealing($validStealing)
    {
        $this->validStealing = $validStealing;

        return $this;
    }

    /**
     * Get validStealing
     *
     * @return integer 
     */
    public function getValidStealing()
    {
        return $this->validStealing;
    }

    /**
     * Set validTackling
     *
     * @param integer $validTackling
     * @return Ranking
     */
    public function setValidTackling($validTackling)
    {
        $this->validTackling = $validTackling;

        return $this;
    }

    /**
     * Get validTackling
     *
     * @return integer 
     */
    public function getValidTackling()
    {
        return $this->validTackling;
    }

    /**
     * Set shooting
     *
     * @param integer $shooting
     * @return Ranking
     */
    public function setShooting($shooting)
    {
        $this->shooting = $shooting;

        return $this;
    }

    /**
     * Get shooting
     *
     * @return integer 
     */
    public function getShooting()
    {
        return $this->shooting;
    }

    /**
     * Set stealing
     *
     * @param integer $stealing
     * @return Ranking
     */
    public function setStealing($stealing)
    {
        $this->stealing = $stealing;

        return $this;
    }

    /**
     * Get stealing
     *
     * @return integer 
     */
    public function getStealing()
    {
        return $this->stealing;
    }

    /**
     * Set tackling
     *
     * @param integer $tackling
     * @return Ranking
     */
    public function setTackling($tackling)
    {
        $this->tackling = $tackling;

        return $this;
    }

    /**
     * Get tackling
     *
     * @return integer 
     */
    public function getTackling()
    {
        return $this->tackling;
    }

    /**
     * Set totalPoints
     *
     * @param integer $totalPoints
     * @return Ranking
     */
    public function setTotalPoints($totalPoints)
    {
        $this->totalPoints = $totalPoints;

        return $this;
    }

    /**
     * Get totalPoints
     *
     * @return integer 
     */
    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    /**
     * Set monthMatches
     *
     * @param integer $monthMatches
     * @return Ranking
     */
    public function setMonthMatches($monthMatches)
    {
        $this->monthMatches = $monthMatches;

        return $this;
    }

    /**
     * Get monthMatches
     *
     * @return integer 
     */
    public function getMonthMatches()
    {
        return $this->monthMatches;
    }

    /**
     * Set monthWins
     *
     * @param integer $monthWins
     * @return Ranking
     */
    public function setMonthWins($monthWins)
    {
        $this->monthWins = $monthWins;

        return $this;
    }

    /**
     * Get monthWins
     *
     * @return integer 
     */
    public function getMonthWins()
    {
        return $this->monthWins;
    }

    /**
     * Set monthDraws
     *
     * @param integer $monthDraws
     * @return Ranking
     */
    public function setMonthDraws($monthDraws)
    {
        $this->monthDraws = $monthDraws;

        return $this;
    }

    /**
     * Get monthDraws
     *
     * @return integer 
     */
    public function getMonthDraws()
    {
        return $this->monthDraws;
    }

    /**
     * Set monthPoints
     *
     * @param integer $monthPoints
     * @return Ranking
     */
    public function setMonthPoints($monthPoints)
    {
        $this->monthPoints = $monthPoints;

        return $this;
    }

    /**
     * Get monthPoints
     *
     * @return integer 
     */
    public function getMonthPoints()
    {
        return $this->monthPoints;
    }

    /**
     * Set monthMom
     *
     * @param integer $monthMom
     * @return Ranking
     */
    public function setMonthMom($monthMom)
    {
        $this->monthMom = $monthMom;

        return $this;
    }

    /**
     * Get monthMom
     *
     * @return integer 
     */
    public function getMonthMom()
    {
        return $this->monthMom;
    }

    /**
     * Set monthValidGoals
     *
     * @param integer $monthValidGoals
     * @return Ranking
     */
    public function setMonthValidGoals($monthValidGoals)
    {
        $this->monthValidGoals = $monthValidGoals;

        return $this;
    }

    /**
     * Get monthValidGoals
     *
     * @return integer 
     */
    public function getMonthValidGoals()
    {
        return $this->monthValidGoals;
    }

    /**
     * Set monthValidAssists
     *
     * @param integer $monthValidAssists
     * @return Ranking
     */
    public function setMonthValidAssists($monthValidAssists)
    {
        $this->monthValidAssists = $monthValidAssists;

        return $this;
    }

    /**
     * Get monthValidAssists
     *
     * @return integer 
     */
    public function getMonthValidAssists()
    {
        return $this->monthValidAssists;
    }

    /**
     * Set monthValidInterception
     *
     * @param integer $monthValidInterception
     * @return Ranking
     */
    public function setMonthValidInterception($monthValidInterception)
    {
        $this->monthValidInterception = $monthValidInterception;

        return $this;
    }

    /**
     * Get monthValidInterception
     *
     * @return integer 
     */
    public function getMonthValidInterception()
    {
        return $this->monthValidInterception;
    }

    /**
     * Set monthValidShooting
     *
     * @param integer $monthValidShooting
     * @return Ranking
     */
    public function setMonthValidShooting($monthValidShooting)
    {
        $this->monthValidShooting = $monthValidShooting;

        return $this;
    }

    /**
     * Get monthValidShooting
     *
     * @return integer 
     */
    public function getMonthValidShooting()
    {
        return $this->monthValidShooting;
    }

    /**
     * Set monthValidStealing
     *
     * @param integer $monthValidStealing
     * @return Ranking
     */
    public function setMonthValidStealing($monthValidStealing)
    {
        $this->monthValidStealing = $monthValidStealing;

        return $this;
    }

    /**
     * Get monthValidStealing
     *
     * @return integer 
     */
    public function getMonthValidStealing()
    {
        return $this->monthValidStealing;
    }

    /**
     * Set monthValidTackling
     *
     * @param integer $monthValidTackling
     * @return Ranking
     */
    public function setMonthValidTackling($monthValidTackling)
    {
        $this->monthValidTackling = $monthValidTackling;

        return $this;
    }

    /**
     * Get monthValidTackling
     *
     * @return integer 
     */
    public function getMonthValidTackling()
    {
        return $this->monthValidTackling;
    }

    /**
     * Set monthShooting
     *
     * @param integer $monthShooting
     * @return Ranking
     */
    public function setMonthShooting($monthShooting)
    {
        $this->monthShooting = $monthShooting;

        return $this;
    }

    /**
     * Get monthShooting
     *
     * @return integer 
     */
    public function getMonthShooting()
    {
        return $this->monthShooting;
    }

    /**
     * Set monthStealing
     *
     * @param integer $monthStealing
     * @return Ranking
     */
    public function setMonthStealing($monthStealing)
    {
        $this->monthStealing = $monthStealing;

        return $this;
    }

    /**
     * Get monthStealing
     *
     * @return integer 
     */
    public function getMonthStealing()
    {
        return $this->monthStealing;
    }

    /**
     * Set monthTackling
     *
     * @param integer $monthTackling
     * @return Ranking
     */
    public function setMonthTackling($monthTackling)
    {
        $this->monthTackling = $monthTackling;

        return $this;
    }

    /**
     * Get monthTackling
     *
     * @return integer 
     */
    public function getMonthTackling()
    {
        return $this->monthTackling;
    }

    /**
     * Set monthTotalPoints
     *
     * @param integer $monthTotalPoints
     * @return Ranking
     */
    public function setMonthTotalPoints($monthTotalPoints)
    {
        $this->monthTotalPoints = $monthTotalPoints;

        return $this;
    }

    /**
     * Get monthTotalPoints
     *
     * @return integer 
     */
    public function getMonthTotalPoints()
    {
        return $this->monthTotalPoints;
    }

    /**
     * Get index
     *
     * @return integer 
     */
    public function getIndex()
    {
        return $this->index;
    }
}
