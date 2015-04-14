<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Neikeq\ClubsBundle\DependencyInjection\UserRoles;

/**
 * Users
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $lastIp;

    /**
     * @var \DateTime
     */
    private $creation;

    /**
     * @var \DateTime
     */
    private $lastConnection;

    /**
     * @var integer
     */
    private $online;

    /**
     * @var integer
     */
    private $server;

    /**
     * @var integer
     */
    private $kash;

    /**
     * @var boolean
     */
    private $settingsCamera;

    /**
     * @var boolean
     */
    private $settingsShadows;

    /**
     * @var boolean
     */
    private $settingsNames;

    /**
     * @var boolean
     */
    private $volEffects;

    /**
     * @var boolean
     */
    private $volMusic;

    /**
     * @var boolean
     */
    private $settingsInvites;

    /**
     * @var boolean
     */
    private $settingsWhispers;

    /**
     * @var integer
     */
    private $settingsCountry;

    /**
     * @var \DateTime
     */
    private $lastCharDeletion;

    /**
     * @var integer
     */
    private $slotOne;

    /**
     * @var integer
     */
    private $slotTwo;

    /**
     * @var integer
     */
    private $slotThree;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return explode('$', $this->password)[2];
    }

    /**
     * Set lastIp
     *
     * @param string $lastIp
     * @return Users
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;

        return $this;
    }

    /**
     * Get lastIp
     *
     * @return string
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * Set creation
     *
     * @param \DateTime $creation
     * @return Users
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
     * Set lastConnection
     *
     * @param \DateTime $lastConnection
     * @return Users
     */
    public function setLastConnection($lastConnection)
    {
        $this->lastConnection = $lastConnection;

        return $this;
    }

    /**
     * Get lastConnection
     *
     * @return \DateTime
     */
    public function getLastConnection()
    {
        return $this->lastConnection;
    }

    /**
     * Set online
     *
     * @param integer $online
     * @return Users
     */
    public function setOnline($online)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return integer
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Set server
     *
     * @param integer $server
     * @return Users
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return integer
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set kash
     *
     * @param integer $kash
     * @return Users
     */
    public function setKash($kash)
    {
        $this->kash = $kash;

        return $this;
    }

    /**
     * Get kash
     *
     * @return integer
     */
    public function getKash()
    {
        return $this->kash;
    }

    /**
     * Set settingsCamera
     *
     * @param boolean $settingsCamera
     * @return Users
     */
    public function setSettingsCamera($settingsCamera)
    {
        $this->settingsCamera = $settingsCamera;

        return $this;
    }

    /**
     * Get settingsCamera
     *
     * @return boolean
     */
    public function getSettingsCamera()
    {
        return $this->settingsCamera;
    }

    /**
     * Set settingsShadows
     *
     * @param boolean $settingsShadows
     * @return Users
     */
    public function setSettingsShadows($settingsShadows)
    {
        $this->settingsShadows = $settingsShadows;

        return $this;
    }

    /**
     * Get settingsShadows
     *
     * @return boolean
     */
    public function getSettingsShadows()
    {
        return $this->settingsShadows;
    }

    /**
     * Set settingsNames
     *
     * @param boolean $settingsNames
     * @return Users
     */
    public function setSettingsNames($settingsNames)
    {
        $this->settingsNames = $settingsNames;

        return $this;
    }

    /**
     * Get settingsNames
     *
     * @return boolean
     */
    public function getSettingsNames()
    {
        return $this->settingsNames;
    }

    /**
     * Set volEffects
     *
     * @param boolean $volEffects
     * @return Users
     */
    public function setVolEffects($volEffects)
    {
        $this->volEffects = $volEffects;

        return $this;
    }

    /**
     * Get volEffects
     *
     * @return boolean
     */
    public function getVolEffects()
    {
        return $this->volEffects;
    }

    /**
     * Set volMusic
     *
     * @param boolean $volMusic
     * @return Users
     */
    public function setVolMusic($volMusic)
    {
        $this->volMusic = $volMusic;

        return $this;
    }

    /**
     * Get volMusic
     *
     * @return boolean
     */
    public function getVolMusic()
    {
        return $this->volMusic;
    }

    /**
     * Set settingsInvites
     *
     * @param boolean $settingsInvites
     * @return Users
     */
    public function setSettingsInvites($settingsInvites)
    {
        $this->settingsInvites = $settingsInvites;

        return $this;
    }

    /**
     * Get settingsInvites
     *
     * @return boolean
     */
    public function getSettingsInvites()
    {
        return $this->settingsInvites;
    }

    /**
     * Set settingsWhispers
     *
     * @param boolean $settingsWhispers
     * @return Users
     */
    public function setSettingsWhispers($settingsWhispers)
    {
        $this->settingsWhispers = $settingsWhispers;

        return $this;
    }

    /**
     * Get settingsWhispers
     *
     * @return boolean
     */
    public function getSettingsWhispers()
    {
        return $this->settingsWhispers;
    }

    /**
     * Set settingsCountry
     *
     * @param integer $settingsCountry
     * @return Users
     */
    public function setSettingsCountry($settingsCountry)
    {
        $this->settingsCountry = $settingsCountry;

        return $this;
    }

    /**
     * Get settingsCountry
     *
     * @return integer
     */
    public function getSettingsCountry()
    {
        return $this->settingsCountry;
    }

    /**
     * Set lastCharDeletion
     *
     * @param \DateTime $lastCharDeletion
     * @return Users
     */
    public function setLastCharDeletion($lastCharDeletion)
    {
        $this->lastCharDeletion = $lastCharDeletion;

        return $this;
    }

    /**
     * Get lastCharDeletion
     *
     * @return \DateTime
     */
    public function getLastCharDeletion()
    {
        return $this->lastCharDeletion;
    }

    /**
     * Set slotOne
     *
     * @param integer $slotOne
     * @return Users
     */
    public function setSlotOne($slotOne)
    {
        $this->slotOne = $slotOne;

        return $this;
    }

    /**
     * Get slotOne
     *
     * @return integer
     */
    public function getSlotOne()
    {
        return $this->slotOne;
    }

    /**
     * Set slotTwo
     *
     * @param integer $slotTwo
     * @return Users
     */
    public function setSlotTwo($slotTwo)
    {
        $this->slotTwo = $slotTwo;

        return $this;
    }

    /**
     * Get slotTwo
     *
     * @return integer
     */
    public function getSlotTwo()
    {
        return $this->slotTwo;
    }

    /**
     * Set slotThree
     *
     * @param integer $slotThree
     * @return Users
     */
    public function setSlotThree($slotThree)
    {
        $this->slotThree = $slotThree;

        return $this;
    }

    /**
     * Get slotThree
     *
     * @return integer
     */
    public function getSlotThree()
    {
        return $this->slotThree;
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

    public function getRoles()
    {
        $role = UserRoles::getUserRole($this->id);

        if ($role == null) {
            $role = array('ROLE_USER');
        }

        return $role;
    }

    public function getSalt()
    {
        return explode('$', $this->password)[1];
    }

    public function eraseCredentials()
    {

    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized);
    }
}
