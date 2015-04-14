<?php

namespace Neikeq\ClubsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClubsController extends Controller
{
    const clubsPerPage = 5;

    public function clubsAction()
    {
        return $this->clubsPageAction(1);
    }

    public function clubsPageAction($page)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $clubsCountQB = $em->createQueryBuilder();
        $clubsCountQB->select('count(c.id)')
            ->from('NeikeqClubsBundle:Clubs','c');
        $resultAllClubs = $clubsCountQB->getQuery()->getSingleScalarResult();

        $pageClubsQB = $em->createQueryBuilder();
        $pageClubsQB->select('c.id, c.name, c.creation')
           ->from('NeikeqClubsBundle:Clubs','c')
           ->setFirstResult(($page - 1) * self::clubsPerPage)
           ->setMaxResults(self::clubsPerPage);

        $results = $pageClubsQB->getQuery()->getResult();

        $clubs = array();

        foreach ($results as $club) {
            array_push($clubs, array("id" => $club['id'], "name" => $club['name'],
                "creation" => $club['creation'], "manager" => "", "members" => ""));
        }

        $user = $this->getUser();
        $username = $user == null ? '' : $user->getUsername();

        $twigParams = array('username' => $username, 'clubs' => $clubs,
            'pages' => ceil($resultAllClubs / self::clubsPerPage));

        return $this->render('NeikeqClubsBundle:Default:clubs.html.twig', $twigParams);
    }

    public function createAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'You are not allowed to access this page!');

        return $this->render('NeikeqClubsBundle:Default:create.html.twig');
    }
}
