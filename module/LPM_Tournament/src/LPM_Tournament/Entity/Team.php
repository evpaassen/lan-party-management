<?php

namespace LPM_Tournament\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Team entity.
 *
 * @ORM\Entity
 * @ORM\Table(name="tournament_team")
 */
class Team {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="\LPM_Tournament\Entity\Tournament", inversedBy="teams")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $tournament;

    /**
     * @ORM\OneToMany(targetEntity="\LPM_Tournament\Entity\Player", mappedBy="team")
     */
    protected $players;



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
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param Player[] $players
     */
    public function setPlayers($players) {
        $this->players = $players;
    }

    /**
     * @return Player[]
     */
    public function getPlayers() {
        return $this->players;
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