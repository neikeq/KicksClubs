<?php

namespace Neikeq\ClubsBundle\DependencyInjection;

use Doctrine\ORM\EntityManager;

use Neikeq\ClubsBundle\DependencyInjection\PlayerUtils;
use Neikeq\ClubsBundle\Entity\Clubs;
use Neikeq\ClubsBundle\Entity\ClubMembers;

class ClubUtils
{
    const clubsPerPage = 5;

    public static function clubInfo($clubId, $em)
    {
        $club = $em->getRepository('NeikeqClubsBundle:Clubs')->find($clubId);

        $members = self::clubMembersInfo($clubId, $em);

        return array(
            'id' => $club->getId(),
            'name' => $club->getName(),
            'description' => $club->getDescription(),
            'membership' => $club->getMembershipMode(),
            'creation' => $club->getCreation()->format('Y-m-d'),
            'manager' => self::clubManager($clubId, $em),
            'members' => $members
        );
    }

    public static function clubMembersInfo($clubId, $em)
    {
        $clubMembers = $em->getRepository('NeikeqClubsBundle:ClubMembers')->findAllMembersBy($clubId);

        $clubMembersInfo = array();

        foreach ($clubMembers as $clubMember) {
            $memberInfo = PlayerUtils::getCharacterInfo($clubMember->getId(), $em);
            $memberInfo['role'] = $clubMember->getRole();

            array_push($clubMembersInfo, $memberInfo);
        }

        return $clubMembersInfo;
    }

    public static function clubsCount($em)
    {
        $clubsCountQB = $em->createQueryBuilder();
        $clubsCountQB->select('count(c.id)')
            ->from('NeikeqClubsBundle:Clubs', 'c');
        return $clubsCountQB->getQuery()->getSingleScalarResult();
    }

    public static function clubAlreadyExists($name, $em)
    {
        $qb = $em->createQueryBuilder();
        $qb->select('c.id')
            ->from('NeikeqClubsBundle:Clubs', 'c')
            ->where('c.name = ?1')
            ->setParameter(1, $name)
            ->setMaxResults(1);
        return !is_null($qb->getQuery()->getOneOrNullResult());
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
                "creation" => $result['creation']->format('Y-m-d'));
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
           ->andWhere('m.role = \'MANAGER\'')
           ->setParameter(1, $clubId)
           ->setMaxResults(1);
        $managerId = $pageClubsQB->getQuery()->getSingleScalarResult();

        return PlayerUtils::getCharacterInfo($managerId, $em)['name'];
    }

    public static function membersCount($clubId, $em)
    {
        return $em->getRepository('NeikeqClubsBundle:ClubMembers')->findAllMembersBy($clubId)->count();
    }

    public static function createClub($clubName, $membershipMode, $description, $em)
    {
        $club = new Clubs();
        $club->setName($clubName);
        $club->setMembershipMode($membershipMode);
        $club->setDescription($description);

        $em->persist($club);
        $em->flush();

        return $club->getId();
    }

    public static function addClubMember($playerId, $clubId, $role, $em) {
        $clubMember = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOneAnyMemberBy($playerId);

        if (is_null($clubMember)) {
            $clubMember = new ClubMembers();
            $clubMember->setId($playerId);
        }

        $clubMember->setClubId($clubId);
        $clubMember->setRole($role);

        $em->persist($clubMember);
        $em->flush();
    }
}
