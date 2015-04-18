<?php

namespace Neikeq\ClubsBundle\Twig;

use Neikeq\ClubsBundle\DependencyInjection\PlayerRoles;

class PlayerRole extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('grants', array($this, 'isGranted')),
        );
    }

    public function isGranted($playerRole, $role)
    {
        return PlayerRoles::isGranted($role, $playerRole);
    }

    public function getName()
    {
        return 'player_role';
    }
}
