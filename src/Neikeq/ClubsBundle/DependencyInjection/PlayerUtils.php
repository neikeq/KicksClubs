<?php

namespace Neikeq\ClubsBundle\DependencyInjection;

use Doctrine\ORM\EntityManager;

class PlayerUtils
{
    public static function getSelectedPlayer($session, $user)
    {
        return PlayerUtils::getPlayerBySlot($session->get('selectedSlot'), $user);
    }

    public static function getPlayerRole($playerId, $em)
    {
        if (self::mustSelectCharacter($playerId)) {
            return '';
        }

        $clubMember = $em->getRepository('NeikeqClubsBundle:ClubMembers')->find($playerId);

        if ($clubMember != null) {
            return $clubMember->getRole();
        }

        return 'CHARACTER';
    }

    public static function getCharacterInfo($playerId, $em)
    {
        if (self::mustSelectCharacter($playerId)) {
            return array();
        }

        $player = $em->getRepository('NeikeqClubsBundle:Characters')->find($playerId);

        return array(
            'name' => $player->getName(),
            'level' => $player->getLevel(),
            'position' => $player->getPosition()
        );
    }

    public static function getCharacterName($playerId, $em)
    {
        $player = $em->getRepository('NeikeqClubsBundle:Characters')->find($playerId);

        return $player->getName();
    }

    public static function mustSelectCharacter($playerId)
    {
        return $playerId == null;
    }

    public static function getPlayerBySlot($index, $user)
    {
        if (is_null($index)) {
            return null;
        }

        switch ($index) {
            case 0:
                return $user->getSlotOne();
            case 1:
                return $user->getSlotTwo();
            case 2:
                return $user->getSlotThree();
            default:
                return null;
        }
    }

    public static function characterList($user, $em)
    {
        $characters = array();

        for ($i = 0; $i < 3; $i++) {
            $playerId = self::getPlayerBySlot($i, $user);

            if ($playerId != null) {
                array_push($characters, array('slot' => $i,
                    'name' => self::getCharacterName($playerId, $em)));
            }
        }

        return array('name' => '', 'characters' => $characters);
    }
}
