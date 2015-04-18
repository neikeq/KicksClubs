<?php

namespace Neikeq\ClubsBundle\DependencyInjection;

use Doctrine\ORM\EntityManager;

use Neikeq\ClubsBundle\NeikeqClubsBundle;

class ClubUtils
{
    const clubsPerPage = 5;

    public static function clubsCount($em)
    {
        $clubsCountQB = $em->createQueryBuilder();
        $clubsCountQB->select('count(c.id)')
            ->from('NeikeqClubsBundle:Clubs','c');
        return $clubsCountQB->getQuery()->getSingleScalarResult();
    }

    public static function clubsForPage($page, $em)
    {
        $pageClubsQB = $em->createQueryBuilder();
        $pageClubsQB->select('c.id, c.name, c.creation')
           ->from('NeikeqClubsBundle:Clubs','c')
           ->setFirstResult(($page - 1) * self::clubsPerPage)
           ->setMaxResults(self::clubsPerPage);
        $results = $pageClubsQB->getQuery()->getResult();

        $clubs = array();

        foreach ($results as $result) {
            $club = array("id" => $result['id'], "name" => $result['name'],
                "creation" => $result['creation'], "manager" => "", "members" => "");
            array_push($clubs, $club);
        }

        return $clubs;
    }
}
