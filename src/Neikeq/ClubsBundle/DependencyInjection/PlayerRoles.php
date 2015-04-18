<?php

namespace Neikeq\ClubsBundle\DependencyInjection;

class PlayerRoles
{
    const roleTree = array(
        'CHARACTER' => array(),
        'MEMBER' => array('CHARACTER'),
        'MANAGER' => array('CHARACTER', 'MEMBER')
    );

    public static function isGranted($role, $playerRole)
    {
        return $playerRole == $role ||
            (self::hasRole($playerRole) && in_array($role, self::roleTree[$playerRole]));
    }

    public static function hasRole($role)
    {
        return array_key_exists($role, self::roleTree);
    }
}
