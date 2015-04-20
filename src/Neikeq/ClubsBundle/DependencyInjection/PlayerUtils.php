<?php

namespace Neikeq\ClubsBundle\DependencyInjection;

use Doctrine\ORM\EntityManager;

use Neikeq\ClubsBundle\NeikeqClubsBundle;

class PlayerUtils
{
    public static function getSelectedPlayer($session, $user)
    {
        return PlayerUtils::getPlayerBySlot($session->get('selectedSlot'), $user);
    }

    public static function getPlayerRole($playerId)
    {
        if (self::mustSelectCharacter($playerId)) {
            return '';
        }

        $em = NeikeqClubsBundle::getEm();

        $qb = $em->createQueryBuilder();

        $qb->select('m.role')
           ->from('NeikeqClubsBundle:ClubMembers','m')
           ->where('m.id = ?1')
           ->setParameter(1, $playerId)
           ->setMaxResults(1);

        $result = $qb->getQuery()->getOneOrNullResult();

        if ($result != null) {
            return $result['role'];
        }

        return 'CHARACTER';
    }

    public static function getCharacterInfoById($playerId)
    {
        $em = NeikeqClubsBundle::getEm();

        $characterQB = $em->createQueryBuilder();
        $characterQB->select('c.name, c.level')
           ->from('NeikeqClubsBundle:Characters','c')
           ->where('c.id = ?1')
           ->setParameter(1, $playerId)
           ->setMaxResults(1);
        $result = $characterQB->getQuery()->getOneOrNullResult();

        return array('name' => $result['name'], 'level' => $result['level']);
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

    public static function characterList($user)
    {
        $characters = array();

        for ($i = 0; $i < 3; $i++) {
            $playerId = self::getPlayerBySlot($i, $user);

            if ($playerId != null) {
                array_push($characters, array('slot' => $i,
                    'name' => self::getCharacterInfoById($playerId)['name']));
            }
        }

        return array('name' => '', 'characters' => $characters);
    }
}
