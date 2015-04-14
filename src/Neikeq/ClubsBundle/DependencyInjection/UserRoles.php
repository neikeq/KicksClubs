<?php

namespace Neikeq\ClubsBundle\DependencyInjection;

use Doctrine\ORM\EntityManager;
use Neikeq\ClubsBundle\NeikeqClubsBundle;

class UserRoles
{
    public static function getUserRole($userId)
    {
        $em = NeikeqClubsBundle::getEm();

        $qb = $em->createQueryBuilder();

        $qb->select('m.id, m.role')
           ->from('NeikeqClubsBundle:ClubMembers','m')
           ->where('m.playerId = ?1')
           ->setParameter(1, $userId)
           ->setMaxResults(1);

        $result = $qb->getQuery()->getOneOrNullResult();

        if ($result != null) {
            return array('ROLE_' . $result['role']);
        }

        return null;
    }
}
