<?php

namespace Neikeq\ClubsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NeikeqClubsBundle:Default:index.html.twig', array('name' => $name));
    }
}
