<?php

namespace Neikeq\ClubsBundle\Controller;

use Neikeq\ClubsBundle\DependencyInjection\ClubUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerRoles;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ManagerController extends Controller
{
    public function requestsAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $role = PlayerUtils::getPlayerRole($playerId, $em);

        if ($role != 'MANAGER') {
            throw $this->createAccessDeniedException();
        }

        $clubId = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOneMemberBy($playerId)->getClubId();

        $pendingRequests = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findAllPendingMembersBy($clubId);

        $requests = array();

        foreach ($pendingRequests as $pendingRequest) {
            $request = $em->getRepository('NeikeqClubsBundle:Characters')
                ->findOneBy(array('id' => $pendingRequest->getId()));
            array_push($requests, $request);
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'requests' => $requests);

        return $this->render('NeikeqClubsBundle:Default:manager/requests.html.twig', $params);
    }

    public function requestAcceptAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $role = PlayerUtils::getPlayerRole($playerId, $em);

        if ($role != 'MANAGER') {
            throw $this->createAccessDeniedException();
        }

        $clubId = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOneMemberBy($playerId)->getClubId();

        $acceptedMemberId = $request->request->get('player_id');
        $acceptedMemberRequest = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOnePendingMemberBy($acceptedMemberId);

        $error = null;

        if (is_null($acceptedMemberRequest)) {
            $error = 'The member request does not exists.';
        } else {
            if (ClubUtils::membersCount($clubId, $em) < 30) {
                // The member was successfully accepted, add him to the club
                ClubUtils::addClubMember($acceptedMemberId, $clubId, 'MEMBER', $em);
            } else {
                $error = 'The club is full and cannot accept more members.';
            }
        }

        $pendingRequests = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findAllPendingMembersBy($clubId);

        $requests = array();

        foreach ($pendingRequests as $pendingRequest) {
            $request = $em->getRepository('NeikeqClubsBundle:Characters')
                ->findOneBy(array('id' => $pendingRequest->getId()));
            array_push($requests, $request);
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'requests' => $requests);

        if (!is_null($error)) {
            $params['error'] = $error;
        } else {
            $acceptedMember = $em->getRepository('NeikeqClubsBundle:Characters')
                ->findOneBy(array('id' => $acceptedMemberId));
            $params['success'] = 'Member request accepted: ' . $acceptedMember->getName();
        }

        return $this->render('NeikeqClubsBundle:Default:manager/requests.html.twig', $params);
    }

    public function requestRejectAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $role = PlayerUtils::getPlayerRole($playerId, $em);

        if ($role != 'MANAGER') {
            throw $this->createAccessDeniedException();
        }

        $clubId = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOneMemberBy($playerId)->getClubId();

        $acceptedMemberId = $request->request->get('player_id');
        $acceptedMemberRequest = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOnePendingMemberBy($acceptedMemberId);

        $error = null;

        if (is_null($acceptedMemberRequest)) {
            $error = 'The member request does not exists.';
        } else {
            // Reject the request
            ClubUtils::addClubMember($acceptedMemberId, $clubId, 'REJECTED', $em);
        }

        $pendingRequests = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findAllPendingMembersBy($clubId);

        $requests = array();

        foreach ($pendingRequests as $pendingRequest) {
            $request = $em->getRepository('NeikeqClubsBundle:Characters')
                ->findOneBy(array('id' => $pendingRequest->getId()));
            array_push($requests, $request);
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'requests' => $requests);

        if (!is_null($error)) {
            $params['error'] = $error;
        } else {
            $acceptedMember = $em->getRepository('NeikeqClubsBundle:Characters')
                ->findOneBy(array('id' => $acceptedMemberId));
            $params['success'] = 'Member request rejected: ' . $acceptedMember->getName();
        }

        return $this->render('NeikeqClubsBundle:Default:manager/requests.html.twig', $params);
    }
}
