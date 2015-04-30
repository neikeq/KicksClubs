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

    public function informationAction()
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

        $club = $em->getRepository('NeikeqClubsBundle:Clubs')
            ->findOneBy(array('id' => $clubId));

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'club_description' => $club->getDescription());

        return $this->render('NeikeqClubsBundle:Default:manager/information.html.twig', $params);
    }

    public function informationCheckAction(Request $request)
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

        $club = $em->getRepository('NeikeqClubsBundle:Clubs')
            ->findOneBy(array('id' => $clubId));

        $error = null;
        $success = null;

        if ($role == 'MANAGER') {
            $description = $request->request->get('description');

            if (is_null($description)) {
                $error = 'Missing description field.';
            } else if (strlen($description) > 512 || empty($description)) {
                // if the description length is not valid
                $error = 'Club description was not specified or is too long.';
            } else {
                // Update the club description
                $club->setDescription($description);
                $em->persist($club);
                $em->flush();

                $success = 'The club description was updated successfully';
            }
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'club_description' => $club->getDescription());

        if (!is_null($error)) {
            $params['error'] = $error;
        } else if (!is_null($success)) {
            $params['success'] = $success;
        }

        return $this->render('NeikeqClubsBundle:Default:manager/information.html.twig', $params);
    }

    public function membersAction(Request $request)
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

        $memberId = $request->request->get('member_id');

        $error = null;

        if (!is_null($memberId)) {
            $member = $em->getRepository('NeikeqClubsBundle:ClubMembers')
                ->findOneMemberBy($memberId);

            if (is_null($member) || $member->getClubId() != $clubId) {
                $error = 'Invalid member specified.';
            } else {
                $newRole = $request->request->get('new_role');
                $currentRole = $member->getRole();

                if (!is_null($newRole) && $newRole != $currentRole) {
                    if ($currentRole != 'MANAGER') {
                        $validNewRole = $newRole == 'MEMBER';

                        if (!$validNewRole && $newRole == 'CAPTAIN') {
                            $captains = $em->getRepository('NeikeqClubsBundle:ClubMembers')
                                ->findAllCaptainsBy($clubId);
                            $validNewRole = count($captains) < 2;

                            if (!$validNewRole) {
                                $error = 'The club already have the maximum ' .
                                    'number of captains allowed.';
                            }
                        } else if (!$validNewRole) {
                            $error = 'Invalid member role specified.';
                        }

                        if ($validNewRole) {
                            $member->setRole($newRole);
                            $em->persist($member);
                            $em->flush();
                        }
                    } else {
                        $error = 'Club manager cannot change its own role.';
                    }
                }
            }
        }

        $members = ClubUtils::clubMembersInfo($clubId, $em);
        $captains = $em->getRepository('NeikeqClubsBundle:ClubMembers')->findAllCaptainsBy($clubId);

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'members' => $members,
            'captains_count' => count($captains));

        if (!is_null($error)) {
            $params['error'] = $error;
        }

        return $this->render('NeikeqClubsBundle:Default:manager/members.html.twig', $params);
    }

    public function kickOutAction(Request $request)
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

        $memberToKickId = $request->request->get('member_id');
        $memberToKick = $em->getRepository('NeikeqClubsBundle:ClubMembers')
            ->findOneMemberBy($memberToKickId);

        $memberKickedName = null;

        if ($role == 'MANAGER' && !is_null($memberToKick)) {
            $memberToKickRole = $memberToKick->getRole();

            if ($memberToKickRole == 'MEMBER' || $memberToKickRole == 'CAPTAIN') {
                $memberKickedName = PlayerUtils::getCharacterName($memberToKickId, $em);

                $em->remove($memberToKick);
                $em->flush();
            }
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo);

        if (!is_null($memberKickedName)) {
            $params['member_kicked'] = $memberKickedName;
        }

        return $this->render('NeikeqClubsBundle:Default:manager/kickout.html.twig', $params);
    }

    public function advancedAction(Request $request)
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
        $club = $em->getRepository('NeikeqClubsBundle:Clubs')
            ->findOneBy(array('id' => $clubId));

        $newMembership = $request->request->get('membership');

        $errors = array();
        $success = array();

        if (!is_null($newMembership)) {
            // if the membership mode is valid
            if (in_array($newMembership, array('APPROVED', 'IMMEDIATE', 'DISCONTINUED'), true)) {
                // update membership mode
                $club->setMembershipMode($newMembership);
                $em->persist($club);
                $em->flush();

                array_push($success, 'Membership mode set to: ' . $newMembership);
            } else {
                array_push($errors, 'Invalid membership mode.');
            }
        }

        $playerInfo = PlayerUtils::getCharacterInfo($playerId, $em);
        $playerInfo['role'] = $role;

        // params for the twig template
        $params = array('player' => $playerInfo, 'membership_mode' => $club->getMembershipMode(),
            'errors' => $errors, 'success' => $success);

        return $this->render('NeikeqClubsBundle:Default:manager/advanced.html.twig', $params);
    }
}
