<?php

namespace Neikeq\ClubsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class NeikeqClubsBundle extends Bundle
{
    private static $containerInstance = null;

    public function setContainer(\Symfony\Component\DependencyInjection\ContainerInterface $container = null)
    {
        parent::setContainer($container);
        self::$containerInstance = $container;
    }

    public static function getContainer()
    {
        return self::$containerInstance;
    }

    public static function getEm($manager = 'default')
    {
        return self::$containerInstance->get('doctrine')->getEntityManager($manager);
    }
}
