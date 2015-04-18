<?php

namespace Neikeq\ClubsBundle\Controller;

use Neikeq\ClubsBundle\DependencyInjection\PlayerUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerRoles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClubsController extends Controller
{
    const clubsPerPage = 5;

    public function clubsAction()
    {
        return $this->clubsPageAction(1);
    }

    public function clubsPageAction($page)
    {
        $playerId = $this->get('session')->get('selectedPlayerId');

        if ($this->isGranted('ROLE_USER') && PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->get('doctrine.orm.entity_manager');

        // get the number of clubs registered
        $clubsCountQB = $em->createQueryBuilder();
        $clubsCountQB->select('count(c.id)')
            ->from('NeikeqClubsBundle:Clubs','c');
        $resultAllClubs = $clubsCountQB->getQuery()->getSingleScalarResult();

        // get a result of clubs for the current page
        $pageClubsQB = $em->createQueryBuilder();
        $pageClubsQB->select('c.id, c.name, c.creation')
           ->from('NeikeqClubsBundle:Clubs','c')
           ->setFirstResult(($page - 1) * self::clubsPerPage)
           ->setMaxResults(self::clubsPerPage);
        $results = $pageClubsQB->getQuery()->getResult();

        // retrieve the clubs information from the result
        $clubs = array();
        foreach ($results as $club) {
            array_push($clubs, array("id" => $club['id'], "name" => $club['name'],
                "creation" => $club['creation'], "manager" => "", "members" => ""));
        }

        // if user is not authenticated, set username to empty
        $name = $playerId == null ? '' : PlayerUtils::getCharacterNameById($playerId);

        // params for the twig template
        $params = array('name' => $name, 'player_role' => PlayerUtils::getPlayerRole($playerId),
            'clubs' => $clubs, 'pages' => ceil($resultAllClubs / self::clubsPerPage));

        return $this->render('NeikeqClubsBundle:Default:clubs.html.twig', $params);
    }

    public function createAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = $this->get('session')->get('selectedPlayerId');

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $playerRole = PlayerUtils::getPlayerRole($playerId);

        // if the user is already a club member, redirect to his club page
        if (PlayerRoles::isGranted('MEMBER', $playerRole)) {
            return $this->redirect($this->generateUrl('kicks_clubs_myclub'));
        }

        $params = array('name' => PlayerUtils::getCharacterNameById($playerId),
            'player_role' => $playerRole);

        return $this->render('NeikeqClubsBundle:Default:create.html.twig', $params);
    }

    public function characterAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = $this->get('session')->get('selectedPlayerId');

        $params = array_merge(PlayerUtils::characterList($this->getUser()),
            array('player_role' => PlayerUtils::getPlayerRole($playerId)));

        return $this->render('NeikeqClubsBundle:Default:character.html.twig', $params);
    }

    public function characterCheckAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        // TODO check if user is the character owner, and store slot instead of playerId
        $this->get('session')->set('selectedPlayerId', $request->query->get('character', 1));
        $this->get('session')->save();

        return $this->redirect($this->generateUrl('kicks_clubs_clubs'));
    }
}
