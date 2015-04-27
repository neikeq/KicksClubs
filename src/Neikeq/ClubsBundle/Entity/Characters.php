<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Characters
 */
class Characters
{
    /**
     * @var integer
     */
    private $owner;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var integer
     */
    private $level;

    /**
     * @var integer
     */
    private $blocked;

    /**
     * @var integer
     */
    private $moderator;

    /**
     * @var integer
     */
    private $visible;

    /**
     * @var integer
     */
    private $questCurrent;

    /**
     * @var integer
     */
    private $questMatchesLeft;

    /**
     * @var boolean
     */
    private $tutorialDribbling;

    /**
     * @var boolean
     */
    private $tutorialPassing;

    /**
     * @var boolean
     */
    private $tutorialShooting;

    /**
     * @var boolean
     */
    private $tutorialDefense;

    /**
     * @var integer
     */
    private $receivedReward;

    /**
     * @var integer
     */
    private $experience;

    /**
     * @var integer
     */
    private $points;

    /**
     * @var integer
     */
    private $ticketsKash;

    /**
     * @var integer
     */
    private $ticketsPoints;

    /**
     * @var integer
     */
    private $animation;

    /**
     * @var integer
     */
    private $face;

    /**
     * @var integer
     */
    private $defaultHead;

    /**
     * @var integer
     */
    private $defaultShirts;

    /**
     * @var integer
     */
    private $defaultPants;

    /**
     * @var integer
     */
    private $defaultShoes;

    /**
     * @var integer
     */
    private $statsPoints;

    /**
     * @var integer
     */
    private $statsRunning;

    /**
     * @var integer
     */
    private $statsEndurance;

    /**
     * @var integer
     */
    private $statsAgility;

    /**
     * @var integer
     */
    private $statsBallControl;

    /**
     * @var integer
     */
    private $statsDribbling;

    /**
     * @var integer
     */
    private $statsStealing;

    /**
     * @var integer
     */
    private $statsTackling;

    /**
     * @var integer
     */
    private $statsHeading;

    /**
     * @var integer
     */
    private $statsShortShots;

    /**
     * @var integer
     */
    private $statsLongShots;

    /**
     * @var integer
     */
    private $statsCrossing;

    /**
     * @var integer
     */
    private $statsShortPasses;

    /**
     * @var integer
     */
    private $statsLongPasses;

    /**
     * @var integer
     */
    private $statsMarking;

    /**
     * @var integer
     */
    private $statsGoalkeeping;

    /**
     * @var integer
     */
    private $statsPunching;

    /**
     * @var integer
     */
    private $statsDefense;

    /**
     * @var string
     */
    private $statusMessage;

    /**
     * @var string
     */
    private $friendsList;

    /**
     * @var string
     */
    private $ignoredList;

    /**
     * @var integer
     */
    private $historyMatches;

    /**
     * @var integer
     */
    private $historyWins;

    /**
     * @var integer
     */
    private $historyDraws;

    /**
     * @var integer
     */
    private $historyPoints;

    /**
     * @var integer
     */
    private $historyMom;

    /**
     * @var integer
     */
    private $historyValidGoals;

    /**
     * @var integer
     */
    private $historyValidAssists;

    /**
     * @var integer
     */
    private $historyValidInterception;

    /**
     * @var integer
     */
    private $historyValidShooting;

    /**
     * @var integer
     */
    private $historyValidStealing;

    /**
     * @var integer
     */
    private $historyValidTackling;

    /**
     * @var integer
     */
    private $historyShooting;

    /**
     * @var integer
     */
    private $historyStealing;

    /**
     * @var integer
     */
    private $historyTackling;

    /**
     * @var integer
     */
    private $historyTotalPoints;

    /**
     * @var integer
     */
    private $historyMonthMatches;

    /**
     * @var integer
     */
    private $historyMonthWins;

    /**
     * @var integer
     */
    private $historyMonthDraws;

    /**
     * @var integer
     */
    private $historyMonthPoints;

    /**
     * @var integer
     */
    private $historyMonthMom;

    /**
     * @var integer
     */
    private $historyMonthValidGoals;

    /**
     * @var integer
     */
    private $historyMonthValidAssists;

    /**
     * @var integer
     */
    private $historyMonthValidInterception;

    /**
     * @var integer
     */
    private $historyMonthValidShooting;

    /**
     * @var integer
     */
    private $historyMonthValidStealing;

    /**
     * @var integer
     */
    private $historyMonthValidTackling;

    /**
     * @var integer
     */
    private $historyMonthShooting;

    /**
     * @var integer
     */
    private $historyMonthStealing;

    /**
     * @var integer
     */
    private $historyMonthTackling;

    /**
     * @var integer
     */
    private $historyMonthTotalPoints;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set owner
     *
     * @param integer $owner
     * @return Characters
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return integer
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Characters
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
     * Set position
     *
     * @param integer $position
     * @return Characters
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Characters
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
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

    /**
     * Set blocked
     *
     * @param integer $blocked
     * @return Characters
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * Get blocked
     *
     * @return integer
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * Set moderator
     *
     * @param integer $moderator
     * @return Characters
     */
    public function setModerator($moderator)
    {
        $this->moderator = $moderator;

        return $this;
    }

    /**
     * Get moderator
     *
     * @return integer
     */
    public function getModerator()
    {
        return $this->moderator;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return Characters
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
     * Set questCurrent
     *
     * @param integer $questCurrent
     * @return Characters
     */
    public function setQuestCurrent($questCurrent)
    {
        $this->questCurrent = $questCurrent;

        return $this;
    }

    /**
     * Get questCurrent
     *
     * @return integer
     */
    public function getQuestCurrent()
    {
        return $this->questCurrent;
    }

    /**
     * Set questMatchesLeft
     *
     * @param integer $questMatchesLeft
     * @return Characters
     */
    public function setQuestMatchesLeft($questMatchesLeft)
    {
        $this->questMatchesLeft = $questMatchesLeft;

        return $this;
    }

    /**
     * Get questMatchesLeft
     *
     * @return integer
     */
    public function getQuestMatchesLeft()
    {
        return $this->questMatchesLeft;
    }

    /**
     * Set tutorialDribbling
     *
     * @param boolean $tutorialDribbling
     * @return Characters
     */
    public function setTutorialDribbling($tutorialDribbling)
    {
        $this->tutorialDribbling = $tutorialDribbling;

        return $this;
    }

    /**
     * Get tutorialDribbling
     *
     * @return boolean
     */
    public function getTutorialDribbling()
    {
        return $this->tutorialDribbling;
    }

    /**
     * Set tutorialPassing
     *
     * @param boolean $tutorialPassing
     * @return Characters
     */
    public function setTutorialPassing($tutorialPassing)
    {
        $this->tutorialPassing = $tutorialPassing;

        return $this;
    }

    /**
     * Get tutorialPassing
     *
     * @return boolean
     */
    public function getTutorialPassing()
    {
        return $this->tutorialPassing;
    }

    /**
     * Set tutorialShooting
     *
     * @param boolean $tutorialShooting
     * @return Characters
     */
    public function setTutorialShooting($tutorialShooting)
    {
        $this->tutorialShooting = $tutorialShooting;

        return $this;
    }

    /**
     * Get tutorialShooting
     *
     * @return boolean
     */
    public function getTutorialShooting()
    {
        return $this->tutorialShooting;
    }

    /**
     * Set tutorialDefense
     *
     * @param boolean $tutorialDefense
     * @return Characters
     */
    public function setTutorialDefense($tutorialDefense)
    {
        $this->tutorialDefense = $tutorialDefense;

        return $this;
    }

    /**
     * Get tutorialDefense
     *
     * @return boolean
     */
    public function getTutorialDefense()
    {
        return $this->tutorialDefense;
    }

    /**
     * Set receivedReward
     *
     * @param integer $receivedReward
     * @return Characters
     */
    public function setReceivedReward($receivedReward)
    {
        $this->receivedReward = $receivedReward;

        return $this;
    }

    /**
     * Get receivedReward
     *
     * @return integer
     */
    public function getReceivedReward()
    {
        return $this->receivedReward;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     * @return Characters
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
     * Set points
     *
     * @param integer $points
     * @return Characters
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
     * Set ticketsKash
     *
     * @param integer $ticketsKash
     * @return Characters
     */
    public function setTicketsKash($ticketsKash)
    {
        $this->ticketsKash = $ticketsKash;

        return $this;
    }

    /**
     * Get ticketsKash
     *
     * @return integer
     */
    public function getTicketsKash()
    {
        return $this->ticketsKash;
    }

    /**
     * Set ticketsPoints
     *
     * @param integer $ticketsPoints
     * @return Characters
     */
    public function setTicketsPoints($ticketsPoints)
    {
        $this->ticketsPoints = $ticketsPoints;

        return $this;
    }

    /**
     * Get ticketsPoints
     *
     * @return integer
     */
    public function getTicketsPoints()
    {
        return $this->ticketsPoints;
    }

    /**
     * Set animation
     *
     * @param integer $animation
     * @return Characters
     */
    public function setAnimation($animation)
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * Get animation
     *
     * @return integer
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * Set face
     *
     * @param integer $face
     * @return Characters
     */
    public function setFace($face)
    {
        $this->face = $face;

        return $this;
    }

    /**
     * Get face
     *
     * @return integer
     */
    public function getFace()
    {
        return $this->face;
    }

    /**
     * Set defaultHead
     *
     * @param integer $defaultHead
     * @return Characters
     */
    public function setDefaultHead($defaultHead)
    {
        $this->defaultHead = $defaultHead;

        return $this;
    }

    /**
     * Get defaultHead
     *
     * @return integer
     */
    public function getDefaultHead()
    {
        return $this->defaultHead;
    }

    /**
     * Set defaultShirts
     *
     * @param integer $defaultShirts
     * @return Characters
     */
    public function setDefaultShirts($defaultShirts)
    {
        $this->defaultShirts = $defaultShirts;

        return $this;
    }

    /**
     * Get defaultShirts
     *
     * @return integer
     */
    public function getDefaultShirts()
    {
        return $this->defaultShirts;
    }

    /**
     * Set defaultPants
     *
     * @param integer $defaultPants
     * @return Characters
     */
    public function setDefaultPants($defaultPants)
    {
        $this->defaultPants = $defaultPants;

        return $this;
    }

    /**
     * Get defaultPants
     *
     * @return integer
     */
    public function getDefaultPants()
    {
        return $this->defaultPants;
    }

    /**
     * Set defaultShoes
     *
     * @param integer $defaultShoes
     * @return Characters
     */
    public function setDefaultShoes($defaultShoes)
    {
        $this->defaultShoes = $defaultShoes;

        return $this;
    }

    /**
     * Get defaultShoes
     *
     * @return integer
     */
    public function getDefaultShoes()
    {
        return $this->defaultShoes;
    }

    /**
     * Set statsPoints
     *
     * @param integer $statsPoints
     * @return Characters
     */
    public function setStatsPoints($statsPoints)
    {
        $this->statsPoints = $statsPoints;

        return $this;
    }

    /**
     * Get statsPoints
     *
     * @return integer
     */
    public function getStatsPoints()
    {
        return $this->statsPoints;
    }

    /**
     * Set statsRunning
     *
     * @param integer $statsRunning
     * @return Characters
     */
    public function setStatsRunning($statsRunning)
    {
        $this->statsRunning = $statsRunning;

        return $this;
    }

    /**
     * Get statsRunning
     *
     * @return integer
     */
    public function getStatsRunning()
    {
        return $this->statsRunning;
    }

    /**
     * Set statsEndurance
     *
     * @param integer $statsEndurance
     * @return Characters
     */
    public function setStatsEndurance($statsEndurance)
    {
        $this->statsEndurance = $statsEndurance;

        return $this;
    }

    /**
     * Get statsEndurance
     *
     * @return integer
     */
    public function getStatsEndurance()
    {
        return $this->statsEndurance;
    }

    /**
     * Set statsAgility
     *
     * @param integer $statsAgility
     * @return Characters
     */
    public function setStatsAgility($statsAgility)
    {
        $this->statsAgility = $statsAgility;

        return $this;
    }

    /**
     * Get statsAgility
     *
     * @return integer
     */
    public function getStatsAgility()
    {
        return $this->statsAgility;
    }

    /**
     * Set statsBallControl
     *
     * @param integer $statsBallControl
     * @return Characters
     */
    public function setStatsBallControl($statsBallControl)
    {
        $this->statsBallControl = $statsBallControl;

        return $this;
    }

    /**
     * Get statsBallControl
     *
     * @return integer
     */
    public function getStatsBallControl()
    {
        return $this->statsBallControl;
    }

    /**
     * Set statsDribbling
     *
     * @param integer $statsDribbling
     * @return Characters
     */
    public function setStatsDribbling($statsDribbling)
    {
        $this->statsDribbling = $statsDribbling;

        return $this;
    }

    /**
     * Get statsDribbling
     *
     * @return integer
     */
    public function getStatsDribbling()
    {
        return $this->statsDribbling;
    }

    /**
     * Set statsStealing
     *
     * @param integer $statsStealing
     * @return Characters
     */
    public function setStatsStealing($statsStealing)
    {
        $this->statsStealing = $statsStealing;

        return $this;
    }

    /**
     * Get statsStealing
     *
     * @return integer
     */
    public function getStatsStealing()
    {
        return $this->statsStealing;
    }

    /**
     * Set statsTackling
     *
     * @param integer $statsTackling
     * @return Characters
     */
    public function setStatsTackling($statsTackling)
    {
        $this->statsTackling = $statsTackling;

        return $this;
    }

    /**
     * Get statsTackling
     *
     * @return integer
     */
    public function getStatsTackling()
    {
        return $this->statsTackling;
    }

    /**
     * Set statsHeading
     *
     * @param integer $statsHeading
     * @return Characters
     */
    public function setStatsHeading($statsHeading)
    {
        $this->statsHeading = $statsHeading;

        return $this;
    }

    /**
     * Get statsHeading
     *
     * @return integer
     */
    public function getStatsHeading()
    {
        return $this->statsHeading;
    }

    /**
     * Set statsShortShots
     *
     * @param integer $statsShortShots
     * @return Characters
     */
    public function setStatsShortShots($statsShortShots)
    {
        $this->statsShortShots = $statsShortShots;

        return $this;
    }

    /**
     * Get statsShortShots
     *
     * @return integer
     */
    public function getStatsShortShots()
    {
        return $this->statsShortShots;
    }

    /**
     * Set statsLongShots
     *
     * @param integer $statsLongShots
     * @return Characters
     */
    public function setStatsLongShots($statsLongShots)
    {
        $this->statsLongShots = $statsLongShots;

        return $this;
    }

    /**
     * Get statsLongShots
     *
     * @return integer
     */
    public function getStatsLongShots()
    {
        return $this->statsLongShots;
    }

    /**
     * Set statsCrossing
     *
     * @param integer $statsCrossing
     * @return Characters
     */
    public function setStatsCrossing($statsCrossing)
    {
        $this->statsCrossing = $statsCrossing;

        return $this;
    }

    /**
     * Get statsCrossing
     *
     * @return integer
     */
    public function getStatsCrossing()
    {
        return $this->statsCrossing;
    }

    /**
     * Set statsShortPasses
     *
     * @param integer $statsShortPasses
     * @return Characters
     */
    public function setStatsShortPasses($statsShortPasses)
    {
        $this->statsShortPasses = $statsShortPasses;

        return $this;
    }

    /**
     * Get statsShortPasses
     *
     * @return integer
     */
    public function getStatsShortPasses()
    {
        return $this->statsShortPasses;
    }

    /**
     * Set statsLongPasses
     *
     * @param integer $statsLongPasses
     * @return Characters
     */
    public function setStatsLongPasses($statsLongPasses)
    {
        $this->statsLongPasses = $statsLongPasses;

        return $this;
    }

    /**
     * Get statsLongPasses
     *
     * @return integer
     */
    public function getStatsLongPasses()
    {
        return $this->statsLongPasses;
    }

    /**
     * Set statsMarking
     *
     * @param integer $statsMarking
     * @return Characters
     */
    public function setStatsMarking($statsMarking)
    {
        $this->statsMarking = $statsMarking;

        return $this;
    }

    /**
     * Get statsMarking
     *
     * @return integer
     */
    public function getStatsMarking()
    {
        return $this->statsMarking;
    }

    /**
     * Set statsGoalkeeping
     *
     * @param integer $statsGoalkeeping
     * @return Characters
     */
    public function setStatsGoalkeeping($statsGoalkeeping)
    {
        $this->statsGoalkeeping = $statsGoalkeeping;

        return $this;
    }

    /**
     * Get statsGoalkeeping
     *
     * @return integer
     */
    public function getStatsGoalkeeping()
    {
        return $this->statsGoalkeeping;
    }

    /**
     * Set statsPunching
     *
     * @param integer $statsPunching
     * @return Characters
     */
    public function setStatsPunching($statsPunching)
    {
        $this->statsPunching = $statsPunching;

        return $this;
    }

    /**
     * Get statsPunching
     *
     * @return integer
     */
    public function getStatsPunching()
    {
        return $this->statsPunching;
    }

    /**
     * Set statsDefense
     *
     * @param integer $statsDefense
     * @return Characters
     */
    public function setStatsDefense($statsDefense)
    {
        $this->statsDefense = $statsDefense;

        return $this;
    }

    /**
     * Get statsDefense
     *
     * @return integer
     */
    public function getStatsDefense()
    {
        return $this->statsDefense;
    }

    /**
     * Set statusMessage
     *
     * @param string $statusMessage
     * @return Characters
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;

        return $this;
    }

    /**
     * Get statusMessage
     *
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * Set friendsList
     *
     * @param string $friendsList
     * @return Characters
     */
    public function setFriendsList($friendsList)
    {
        $this->friendsList = $friendsList;

        return $this;
    }

    /**
     * Get friendsList
     *
     * @return string
     */
    public function getFriendsList()
    {
        return $this->friendsList;
    }

    /**
     * Set ignoredList
     *
     * @param string $ignoredList
     * @return Characters
     */
    public function setIgnoredList($ignoredList)
    {
        $this->ignoredList = $ignoredList;

        return $this;
    }

    /**
     * Get ignoredList
     *
     * @return string
     */
    public function getIgnoredList()
    {
        return $this->ignoredList;
    }

    /**
     * Set historyMatches
     *
     * @param integer $historyMatches
     * @return Characters
     */
    public function setHistoryMatches($historyMatches)
    {
        $this->historyMatches = $historyMatches;

        return $this;
    }

    /**
     * Get historyMatches
     *
     * @return integer
     */
    public function getHistoryMatches()
    {
        return $this->historyMatches;
    }

    /**
     * Set historyWins
     *
     * @param integer $historyWins
     * @return Characters
     */
    public function setHistoryWins($historyWins)
    {
        $this->historyWins = $historyWins;

        return $this;
    }

    /**
     * Get historyWins
     *
     * @return integer
     */
    public function getHistoryWins()
    {
        return $this->historyWins;
    }

    /**
     * Set historyDraws
     *
     * @param integer $historyDraws
     * @return Characters
     */
    public function setHistoryDraws($historyDraws)
    {
        $this->historyDraws = $historyDraws;

        return $this;
    }

    /**
     * Get historyDraws
     *
     * @return integer
     */
    public function getHistoryDraws()
    {
        return $this->historyDraws;
    }

    /**
     * Set historyPoints
     *
     * @param integer $historyPoints
     * @return Characters
     */
    public function setHistoryPoints($historyPoints)
    {
        $this->historyPoints = $historyPoints;

        return $this;
    }

    /**
     * Get historyPoints
     *
     * @return integer
     */
    public function getHistoryPoints()
    {
        return $this->historyPoints;
    }

    /**
     * Set historyMom
     *
     * @param integer $historyMom
     * @return Characters
     */
    public function setHistoryMom($historyMom)
    {
        $this->historyMom = $historyMom;

        return $this;
    }

    /**
     * Get historyMom
     *
     * @return integer
     */
    public function getHistoryMom()
    {
        return $this->historyMom;
    }

    /**
     * Set historyValidGoals
     *
     * @param integer $historyValidGoals
     * @return Characters
     */
    public function setHistoryValidGoals($historyValidGoals)
    {
        $this->historyValidGoals = $historyValidGoals;

        return $this;
    }

    /**
     * Get historyValidGoals
     *
     * @return integer
     */
    public function getHistoryValidGoals()
    {
        return $this->historyValidGoals;
    }

    /**
     * Set historyValidAssists
     *
     * @param integer $historyValidAssists
     * @return Characters
     */
    public function setHistoryValidAssists($historyValidAssists)
    {
        $this->historyValidAssists = $historyValidAssists;

        return $this;
    }

    /**
     * Get historyValidAssists
     *
     * @return integer
     */
    public function getHistoryValidAssists()
    {
        return $this->historyValidAssists;
    }

    /**
     * Set historyValidInterception
     *
     * @param integer $historyValidInterception
     * @return Characters
     */
    public function setHistoryValidInterception($historyValidInterception)
    {
        $this->historyValidInterception = $historyValidInterception;

        return $this;
    }

    /**
     * Get historyValidInterception
     *
     * @return integer
     */
    public function getHistoryValidInterception()
    {
        return $this->historyValidInterception;
    }

    /**
     * Set historyValidShooting
     *
     * @param integer $historyValidShooting
     * @return Characters
     */
    public function setHistoryValidShooting($historyValidShooting)
    {
        $this->historyValidShooting = $historyValidShooting;

        return $this;
    }

    /**
     * Get historyValidShooting
     *
     * @return integer
     */
    public function getHistoryValidShooting()
    {
        return $this->historyValidShooting;
    }

    /**
     * Set historyValidStealing
     *
     * @param integer $historyValidStealing
     * @return Characters
     */
    public function setHistoryValidStealing($historyValidStealing)
    {
        $this->historyValidStealing = $historyValidStealing;

        return $this;
    }

    /**
     * Get historyValidStealing
     *
     * @return integer
     */
    public function getHistoryValidStealing()
    {
        return $this->historyValidStealing;
    }

    /**
     * Set historyValidTackling
     *
     * @param integer $historyValidTackling
     * @return Characters
     */
    public function setHistoryValidTackling($historyValidTackling)
    {
        $this->historyValidTackling = $historyValidTackling;

        return $this;
    }

    /**
     * Get historyValidTackling
     *
     * @return integer
     */
    public function getHistoryValidTackling()
    {
        return $this->historyValidTackling;
    }

    /**
     * Set historyShooting
     *
     * @param integer $historyShooting
     * @return Characters
     */
    public function setHistoryShooting($historyShooting)
    {
        $this->historyShooting = $historyShooting;

        return $this;
    }

    /**
     * Get historyShooting
     *
     * @return integer
     */
    public function getHistoryShooting()
    {
        return $this->historyShooting;
    }

    /**
     * Set historyStealing
     *
     * @param integer $historyStealing
     * @return Characters
     */
    public function setHistoryStealing($historyStealing)
    {
        $this->historyStealing = $historyStealing;

        return $this;
    }

    /**
     * Get historyStealing
     *
     * @return integer
     */
    public function getHistoryStealing()
    {
        return $this->historyStealing;
    }

    /**
     * Set historyTackling
     *
     * @param integer $historyTackling
     * @return Characters
     */
    public function setHistoryTackling($historyTackling)
    {
        $this->historyTackling = $historyTackling;

        return $this;
    }

    /**
     * Get historyTackling
     *
     * @return integer
     */
    public function getHistoryTackling()
    {
        return $this->historyTackling;
    }

    /**
     * Set historyTotalPoints
     *
     * @param integer $historyTotalPoints
     * @return Characters
     */
    public function setHistoryTotalPoints($historyTotalPoints)
    {
        $this->historyTotalPoints = $historyTotalPoints;

        return $this;
    }

    /**
     * Get historyTotalPoints
     *
     * @return integer
     */
    public function getHistoryTotalPoints()
    {
        return $this->historyTotalPoints;
    }

    /**
     * Set historyMonthMatches
     *
     * @param integer $historyMonthMatches
     * @return Characters
     */
    public function setHistoryMonthMatches($historyMonthMatches)
    {
        $this->historyMonthMatches = $historyMonthMatches;

        return $this;
    }

    /**
     * Get historyMonthMatches
     *
     * @return integer
     */
    public function getHistoryMonthMatches()
    {
        return $this->historyMonthMatches;
    }

    /**
     * Set historyMonthWins
     *
     * @param integer $historyMonthWins
     * @return Characters
     */
    public function setHistoryMonthWins($historyMonthWins)
    {
        $this->historyMonthWins = $historyMonthWins;

        return $this;
    }

    /**
     * Get historyMonthWins
     *
     * @return integer
     */
    public function getHistoryMonthWins()
    {
        return $this->historyMonthWins;
    }

    /**
     * Set historyMonthDraws
     *
     * @param integer $historyMonthDraws
     * @return Characters
     */
    public function setHistoryMonthDraws($historyMonthDraws)
    {
        $this->historyMonthDraws = $historyMonthDraws;

        return $this;
    }

    /**
     * Get historyMonthDraws
     *
     * @return integer
     */
    public function getHistoryMonthDraws()
    {
        return $this->historyMonthDraws;
    }

    /**
     * Set historyMonthPoints
     *
     * @param integer $historyMonthPoints
     * @return Characters
     */
    public function setHistoryMonthPoints($historyMonthPoints)
    {
        $this->historyMonthPoints = $historyMonthPoints;

        return $this;
    }

    /**
     * Get historyMonthPoints
     *
     * @return integer
     */
    public function getHistoryMonthPoints()
    {
        return $this->historyMonthPoints;
    }

    /**
     * Set historyMonthMom
     *
     * @param integer $historyMonthMom
     * @return Characters
     */
    public function setHistoryMonthMom($historyMonthMom)
    {
        $this->historyMonthMom = $historyMonthMom;

        return $this;
    }

    /**
     * Get historyMonthMom
     *
     * @return integer
     */
    public function getHistoryMonthMom()
    {
        return $this->historyMonthMom;
    }

    /**
     * Set historyMonthValidGoals
     *
     * @param integer $historyMonthValidGoals
     * @return Characters
     */
    public function setHistoryMonthValidGoals($historyMonthValidGoals)
    {
        $this->historyMonthValidGoals = $historyMonthValidGoals;

        return $this;
    }

    /**
     * Get historyMonthValidGoals
     *
     * @return integer
     */
    public function getHistoryMonthValidGoals()
    {
        return $this->historyMonthValidGoals;
    }

    /**
     * Set historyMonthValidAssists
     *
     * @param integer $historyMonthValidAssists
     * @return Characters
     */
    public function setHistoryMonthValidAssists($historyMonthValidAssists)
    {
        $this->historyMonthValidAssists = $historyMonthValidAssists;

        return $this;
    }

    /**
     * Get historyMonthValidAssists
     *
     * @return integer
     */
    public function getHistoryMonthValidAssists()
    {
        return $this->historyMonthValidAssists;
    }

    /**
     * Set historyMonthValidInterception
     *
     * @param integer $historyMonthValidInterception
     * @return Characters
     */
    public function setHistoryMonthValidInterception($historyMonthValidInterception)
    {
        $this->historyMonthValidInterception = $historyMonthValidInterception;

        return $this;
    }

    /**
     * Get historyMonthValidInterception
     *
     * @return integer
     */
    public function getHistoryMonthValidInterception()
    {
        return $this->historyMonthValidInterception;
    }

    /**
     * Set historyMonthValidShooting
     *
     * @param integer $historyMonthValidShooting
     * @return Characters
     */
    public function setHistoryMonthValidShooting($historyMonthValidShooting)
    {
        $this->historyMonthValidShooting = $historyMonthValidShooting;

        return $this;
    }

    /**
     * Get historyMonthValidShooting
     *
     * @return integer
     */
    public function getHistoryMonthValidShooting()
    {
        return $this->historyMonthValidShooting;
    }

    /**
     * Set historyMonthValidStealing
     *
     * @param integer $historyMonthValidStealing
     * @return Characters
     */
    public function setHistoryMonthValidStealing($historyMonthValidStealing)
    {
        $this->historyMonthValidStealing = $historyMonthValidStealing;

        return $this;
    }

    /**
     * Get historyMonthValidStealing
     *
     * @return integer
     */
    public function getHistoryMonthValidStealing()
    {
        return $this->historyMonthValidStealing;
    }

    /**
     * Set historyMonthValidTackling
     *
     * @param integer $historyMonthValidTackling
     * @return Characters
     */
    public function setHistoryMonthValidTackling($historyMonthValidTackling)
    {
        $this->historyMonthValidTackling = $historyMonthValidTackling;

        return $this;
    }

    /**
     * Get historyMonthValidTackling
     *
     * @return integer
     */
    public function getHistoryMonthValidTackling()
    {
        return $this->historyMonthValidTackling;
    }

    /**
     * Set historyMonthShooting
     *
     * @param integer $historyMonthShooting
     * @return Characters
     */
    public function setHistoryMonthShooting($historyMonthShooting)
    {
        $this->historyMonthShooting = $historyMonthShooting;

        return $this;
    }

    /**
     * Get historyMonthShooting
     *
     * @return integer
     */
    public function getHistoryMonthShooting()
    {
        return $this->historyMonthShooting;
    }

    /**
     * Set historyMonthStealing
     *
     * @param integer $historyMonthStealing
     * @return Characters
     */
    public function setHistoryMonthStealing($historyMonthStealing)
    {
        $this->historyMonthStealing = $historyMonthStealing;

        return $this;
    }

    /**
     * Get historyMonthStealing
     *
     * @return integer
     */
    public function getHistoryMonthStealing()
    {
        return $this->historyMonthStealing;
    }

    /**
     * Set historyMonthTackling
     *
     * @param integer $historyMonthTackling
     * @return Characters
     */
    public function setHistoryMonthTackling($historyMonthTackling)
    {
        $this->historyMonthTackling = $historyMonthTackling;

        return $this;
    }

    /**
     * Get historyMonthTackling
     *
     * @return integer
     */
    public function getHistoryMonthTackling()
    {
        return $this->historyMonthTackling;
    }

    /**
     * Set historyMonthTotalPoints
     *
     * @param integer $historyMonthTotalPoints
     * @return Characters
     */
    public function setHistoryMonthTotalPoints($historyMonthTotalPoints)
    {
        $this->historyMonthTotalPoints = $historyMonthTotalPoints;

        return $this;
    }

    /**
     * Get historyMonthTotalPoints
     *
     * @return integer
     */
    public function getHistoryMonthTotalPoints()
    {
        return $this->historyMonthTotalPoints;
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
