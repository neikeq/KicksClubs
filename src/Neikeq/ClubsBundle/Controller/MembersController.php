<?php

namespace Neikeq\ClubsBundle\Controller;

use Neikeq\ClubsBundle\DependencyInjection\ClubUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerRoles;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MembersController extends Controller
{
    public function ajaxMemberInfoAction(Request $request)
    {
        if ($request->isXMLHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $playerId = $request->request->get('member_id');
            $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
            $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

            return new JsonResponse(array('member' => $playerInfo));
        }

        return new Response('This is not a valid ajax request.', 400);
    }

    public function joinAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

        if (is_null($em->getRepository('NeikeqClubsBundle:ClubMembers')->findOneMemberBy($playerId))) {
            $clubId = $request->request->get('club_id');
            $club = $em->getRepository('NeikeqClubsBundle:Clubs')->find($clubId);

            if ($club->getMembershipMode() !== 'DISCONTINUED') {
                $clubName = $club->getName();

                return $this->render('NeikeqClubsBundle:Default:member/join.html.twig',
                    array('player' => $playerInfo, 'club_id' => $clubId, 'club_name' => $clubName));
            } else {
                return $this->render('NeikeqClubsBundle:Default:member/join-result.html.twig',
                    array('player' => $playerInfo, 'error' => 'This club does not accept new requests.'));
            }
        } else {
            return $this->render('NeikeqClubsBundle:Default:member/join-result.html.twig',
                array('player' => $playerInfo, 'error' => 'You are already a club member.'));
        }
    }

    public function joinCheckAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();
        $clubMember = $em->getRepository('NeikeqClubsBundle:ClubMembers')->findOneMemberBy($playerId);

        $clubId = $request->request->get('club_id');
        $club = $em->getRepository('NeikeqClubsBundle:Clubs')->find($clubId);

        $error = null;

        if (is_null($clubMember)) {
            switch ($club->getMembershipMode()) {
                case "DISCONTINUED":
                    $error = 'This club does not accept new requests.';
                    break;
                case "IMMEDIATE":
                    if (ClubUtils::membersCount($clubId, $em) < 30) {
                        ClubUtils::addClubMember($playerId, $clubId, 'MEMBER', $em);
                    } else {
                        $error = 'This club is full and cannot accept more members.';
                    }
                    break;
                case "APPROVED":
                    if (ClubUtils::membersCount($clubId, $em) < 30) {
                        ClubUtils::addClubMember($playerId, $clubId, 'PENDING', $em);
                    } else {
                        $error = 'This club is full and cannot accept more members.';
                    }
                    break;
                default:
            }
        } else {
            $error = 'You are already a club member.';
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

        $params = array('player' => $playerInfo);

        if (!is_null($error)) {
            $params['error'] = $error;
        } else {
            $params['success_message'] = $club->getMembershipMode() == "APPROVED" ?
                'Your request has been received and is waiting for manager approvation.' :
                'Your request has been received and was automatically approved.';
        }

        return $this->render('NeikeqClubsBundle:Default:member/join-result.html.twig', $params);
    }

    public function requestAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $clubMemberRequest = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOnePendingOrRejectedMemberBy($playerId);
        $role = is_null($clubMemberRequest) ? null : $clubMemberRequest->getRole();

        $memberRequest = null;

        if (is_null($clubMemberRequest)) {
            $clubMember = $em->getRepository('NeikeqClubsBundle:ClubMembers')->findOneMemberBy($playerId);
            // if the player is already in a club
            if (!is_null($clubMember)) {
                // the player should not be allowed to access this route
                return $this->redirect($this->generateUrl('kicks_clubs'));
            }
        } else {
            if ($request->request->has('remove_request')) {
                $em->remove($clubMemberRequest);
                $em->flush();
            } else {
                $club = $em->getRepository('NeikeqClubsBundle:Clubs')
                    ->findOneBy(array('id' => $clubMemberRequest->getClubId()));
                $memberRequest = array('club_name' => $club->getName(), 'status' => $role);
            }
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

        // params for the twig template
        $params = array('player' => $playerInfo);

        if (!is_null($memberRequest)) {
            $params['request'] = $memberRequest;
        }

        return $this->render('NeikeqClubsBundle:Default:member/request.html.twig', $params);
    }

    public function leaveAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $clubMember = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOneMemberBy($playerId);

        $error = null;

        if (is_null($clubMember)) {
            $error = 'You are not a club member.';
        } else if ($clubMember->getRole() == 'MANAGER') {
            $error = 'You cannot leave the club because you are the club manager.';
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

        // params for the twig template
        $params = array('player' => $playerInfo);

        if (!is_null($error)) {
            $params['error'] = $error;
            return $this->render('NeikeqClubsBundle:Default:member/leave-result.html.twig', $params);
        }

        $params['club_name'] = $em->getRepository('NeikeqClubsBundle:Clubs')
            ->findOneBy(array('id' => $clubMember->getClubId()))->getName();

        return $this->render('NeikeqClubsBundle:Default:member/leave.html.twig', $params);
    }

    public function leaveCheckAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $em = $this->getDoctrine()->getManager();

        $clubMember = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOneMemberBy($playerId);

        $error = null;

        if (is_null($clubMember)) {
            $error = 'You are not a club member.';
        } else if ($clubMember->getRole() == 'MANAGER') {
            $error = 'You cannot leave the club because you are the club manager.';
        } else {
            $em->remove($clubMember);
            $em->flush();
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = PlayerUtils::getPlayerRole($playerId, $em);

        // params for the twig template
        $params = array('player' => $playerInfo);

        if (!is_null($error)) {
            $params['error'] = $error;
        }

        return $this->render('NeikeqClubsBundle:Default:member/leave-result.html.twig', $params);
    }
}
