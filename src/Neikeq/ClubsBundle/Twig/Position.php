<?php

namespace Neikeq\ClubsBundle\Twig;

class Position extends \Twig_Extension
{
    const positions = array(
        10 => 'FW', 11 => 'ST', 12 => 'CF', 13 => 'WF',
        20 => 'MF', 21 => 'AMF', 22 => 'SMF', 23 => 'CMF', 24 => 'DMF',
        30 => 'DF', 31 => 'SB', 32 => 'CB', 33 => 'SW',
    );

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('position', array($this, 'fromInt')),
        );
    }

    public function fromInt($position)
    {
        return self::positions[$position];
    }

    public function getName()
    {
        return 'position';
    }
}
