<?php

namespace Neikeq\ClubsBundle\Controller;

use Neikeq\ClubsBundle\DependencyInjection\ClubUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerUtils;
use Neikeq\ClubsBundle\DependencyInjection\PlayerRoles;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $playerRole = PlayerUtils::getPlayerRole($playerId);

        // if the user is already a club member, redirect to his club page
        if (PlayerRoles::isGranted('MEMBER', $playerRole)) {
            return $this->redirect($this->generateUrl('kicks_clubs_club'));
        }

        $playerInfo = PlayerUtils::getCharacterInfoById($playerId);
        $playerInfo['role'] = $playerRole;

        return $this->render('NeikeqClubsBundle:Default:create.html.twig',
            array('player' => $playerInfo));
    }

    public function createCheckAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null);

        $playerId = PlayerUtils::getSelectedPlayer($this->get('session'), $this->getUser());

        if (PlayerUtils::mustSelectCharacter($playerId)) {
            return $this->redirect($this->generateUrl('kicks_clubs_character'));
        }

        $playerRole = PlayerUtils::getPlayerRole($playerId);

        // if the user is already a club member, redirect to his club page
        if (PlayerRoles::isGranted('MEMBER', $playerRole)) {
            return $this->redirect($this->generateUrl('kicks_clubs_club'));
        }

        $playerInfo = PlayerUtils::getCharacterInfoById($playerId);
        $playerInfo['role'] = $playerRole;

        // if the player does not meet the level requirements to create a club
        if ($playerInfo['level'] < 25) {
            throw $this->createException('You do not meet the level requirements.');
        }

        $em = $this->get('doctrine.orm.entity_manager');

        // retrieve the club data from the request
        $clubName = $request->request->get('club_name');
        $membershipMode = $request->request->get('membership');
        $description = $request->request->get('description');

        $errors = array();

        // if the name length is not valid or the club already exists
        if (strlen($clubName) > 14 || empty($clubName)) {
            array_push($errors, 'Club name was not specified or is too long.');
        } else if (ClubUtils::clubAlreadyExists($clubName, $em)) {
            array_push($errors, 'The club name is already taken.');
        }

        // if the membership mode is not valid
        if (!in_array($membershipMode, array('APPROVED', 'IMMEDIATE', 'DISCONTINUED'), true)) {
            array_push($errors, 'Invalid membership mode.');
        }

        // if the description length is not valid
        if (strlen($description) > 512 || empty($description)) {
            array_push($errors, 'Club description was not specified or is too long.');
        }

        // if there is no errors
        if (count($errors) == 0) {
            // create the club
            $clubId = ClubUtils::createClub($clubName, $membershipMode, $description, $em);

            // set this player as this club's manager
            ClubUtils::addClubMember($playerId, $clubId, 'MANAGER', $em);

            return $this->redirect($this->generateUrl('kicks_clubs_club'));
        } else {
            return $this->render('NeikeqClubsBundle:Default:create.html.twig', array(
                    'player' => $playerInfo, 'errors' => $errors,
                    'last_club_name' => $clubName, 'last_description' => $description));
        }
    }
}
