<?php

namespace Neikeq\ClubsBundle\Controller;

use Neikeq\ClubsBundle\DependencyInjection\ClubUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerRoles;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClubsController extends Controller
{
    public function clubsAction()
    {
        return $this->clubsPageAction(1);
    }

    public function clubsPageAction($page)
    {
        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if ($this->isGranted('ROLE_USER') && PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $clubsCount = ClubUtils::clubsCount($em);
        $clubs = ClubUtils::clubsForPage($page, $em);

        // if user is not authenticated, set username to empty
        $playerInfo = $playerId == null ? array() : PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

        // params for the twig template
        $params = array('player' => $playerInfo, 'clubs' => $clubs,
            'pages' => ceil($clubsCount / ClubUtils::clubsPerPage));

        // minimum value for pages is 1
        if ($params['pages'] < 1) {
            $params['pages'] = 1;
        }

        return $this->render('NeikeqClubsBundle:Default:clubs.html.twig', $params);
    }

    public function characterAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $user);

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

        return $this->render('NeikeqClubsBundle:Default:character.html.twig',
            array_merge(PlayerUtils::characterList($user, $em), array('player' => $playerInfo)));
    }

    public function characterCheckAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $this->get('session')->set('selectedSlot', $request->request->get('character'));
        $this->get('session')->save();

        return $this->redirect($this->generateUrl('kicks_clubs_clubs'));
    }

    public function clubAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();
        $role = PlayerUtils::getPlayerRole($playerId, $em);

        if (!PlayerRoles::isGranted('MEMBER', $role)) {
            return $this->redirect($this->generateUrl('kicks_clubs_clubs'));
        }

        $clubMember = $em->getRepository('NeikeqClubsBundle:ClubMembers')->findOneMemberBy($playerId);

        $clubInfo = ClubUtils::clubInfo($clubMember->getClubId(), $em);

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'club' => $clubInfo);

        return $this->render('NeikeqClubsBundle:Default:club.html.twig', $params);
    }

    public function ajaxClubInfoAction(Request $request)
    {
        if ($request->isXMLHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            return new JsonResponse(ClubUtils::clubInfo($request->request->get('club_id'), $em));
        }

        return new Response('This is not a valid ajax request.', 400);
    }
}
