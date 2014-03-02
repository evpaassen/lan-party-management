<?php

namespace LPM_Tournament\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Player entity.
 *
 * @ORM\Entity
 * @ORM\Table(name="tournament_player")
 */
class Player {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nickname;

    /**
     * @ORM\ManyToOne(targetEntity="\LPM_Tournament\Entity\Tournament", inversedBy="players")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $tournament;

    /**
     * @ORM\ManyToOne(targetEntity="\LPM_Tournament\Entity\Team", inversedBy="players")
     */
    protected $team;


    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getNickname() {
        return $this->nickname;
    }

    /**
     * @param Team $team
     */
    public function setTeam($team) {
        $this->team = $team;
    }

    /**
     * @return Team
     */
    public function getTeam() {
        return $this->team;
    }

    /**
     * @param Tournament $tournament
     */
    public function setTournament($tournament) {
        $this->tournament = $tournament;
    }

    /**
     * @return Tournament
     */
    public function getTournament() {
        return $this->tournament;
    }
}