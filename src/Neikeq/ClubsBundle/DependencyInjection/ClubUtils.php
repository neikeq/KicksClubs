<?php

namespace Neikeq\ClubsBundle\DependencyInjection;

use Doctrine\ORM\EntityManager;

use Neikeq\ClubsBundle\DependencyInjection\PlayerUtils;
use Neikeq\ClubsBundle\NeikeqClubsBundle;

class ClubUtils
{
    const clubsPerPage = 5;

    public static function clubsCount($em)
    {
        $clubsCountQB = $em->createQueryBuilder();
        $clubsCountQB->select('count(c.id)')
            ->from('NeikeqClubsBundle:Clubs', 'c');
        return $clubsCountQB->getQuery()->getSingleScalarResult();
    }

    public static function clubsForPage($page, $em)
    {
        $pageClubsQB = $em->createQueryBuilder();
        $pageClubsQB->select('c.id, c.name, c.creation')
           ->from('NeikeqClubsBundle:Clubs', 'c')
           ->setFirstResult(($page - 1) * self::clubsPerPage)
           ->setMaxResults(self::clubsPerPage);
        $results = $pageClubsQB->getQuery()->getResult();

        $clubs = array();

        foreach ($results as $result) {
            $club = array("id" => $result['id'], "name" => $result['name'],
                "manager" => self::clubManager($result['id'], $em),
                "members" => self::membersCount($result['id'], $em),
                "creation" => $result['creation']);
            array_push($clubs, $club);
        }

        return $clubs;
    }

    public static function clubManager($clubId, $em)
    {
        $pageClubsQB = $em->createQueryBuilder();
        $pageClubsQB->select('m.id')
           ->from('NeikeqClubsBundle:ClubMembers', 'm')
           ->where('m.clubId = ?1')
           ->setParameter(1, $clubId)
           ->setMaxResults(1);
        $managerId = $pageClubsQB->getQuery()->getSingleScalarResult();

        return PlayerUtils::getCharacterNameById($managerId);
    }

    public static function membersCount($clubId, $em)
    {
        $pageClubsQB = $em->createQueryBuilder();
        $pageClubsQB->select('COUNT(m.id)')
           ->from('NeikeqClubsBundle:ClubMembers', 'm')
           ->where('m.clubId = ?1')
           ->setParameter(1, $clubId);
        return $pageClubsQB->getQuery()->getSingleScalarResult();
    }
}
