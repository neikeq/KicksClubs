<?php

namespace Neikeq\ClubsBundle\Entity;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;

class ClubMembersRepository extends EntityRepository
{
    public function findOneMemberBy($playerId)
    {
        $criteria = new Criteria();

        $criteria->where($criteria->expr()->eq('id', $playerId));
        $criteria->andWhere($criteria->expr()->neq('role', 'REJECTED'));
        $criteria->andWhere($criteria->expr()->neq('role', 'PENDING'));

        return $this->matching($criteria)->get(0);
    }

    public function findAllMembersBy($clubId)
    {
        $criteria = new Criteria();

        $criteria->where($criteria->expr()->eq('clubId', $clubId));
        $criteria->andWhere($criteria->expr()->neq('role', 'REJECTED'));
        $criteria->andWhere($criteria->expr()->neq('role', 'PENDING'));

        return $this->matching($criteria);
    }

    public function findAllPendingMembersBy($clubId)
    {
        return $this->findBy(array('clubId' => $clubId, 'role' => 'PENDING'));
    }

    public function findOnePendingMemberBy($playerId)
    {
        return $this->findOneBy(array('id' => $playerId, 'role' => 'PENDING'));
    }

    public function findOnePendingOrRejectedMemberBy($playerId)
    {
        $criteria = new Criteria();

        $criteria->where($criteria->expr()->eq('id', $playerId));
        $criteria->andWhere($criteria->expr()->in('role', array('REJECTED', 'PENDING')));

        return $this->matching($criteria)->get(0);
    }

    public function findOneAnyMemberBy($playerId) {
        return $this->findOneBy(array('id' => $playerId));
    }
}
