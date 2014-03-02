<?php

namespace LPM_Tournament\Entity;

use Doctrine\ORM\Mapping as ORM;
use LPM_Tournament\InputFilter\TournamentInputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


/**
 * Tournament entity.
 *
 * @ORM\Entity
 * @ORM\Table(name="tournament_tournament")
 */
class Tournament implements InputFilterAwareInterface {

    const STATE_CLOSED = 'CLOSED';
    const STATE_REGISTRATION = 'REGISTRATION';
    const STATE_FINISHED = 'FINISHED';


    /**
     * @var InputFilterInterface
     */
    protected $inputFilter;


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
     * @ORM\Column(type="boolean")
     */
    protected $published;

    /**
     * @ORM\Column(type="integer")
     */
    protected $teamSize;

    /**
     * @ORM\Column(type="string", length=16)
     */
    protected $state;

    /**
     * @ORM\OneToMany(targetEntity="\LPM_Tournament\Entity\Player", mappedBy="tournament")
     */
    protected $players;

    /**
     * @ORM\OneToMany(targetEntity="\LPM_Tournament\Entity\Team", mappedBy="tournament")
     */
    protected $teams;


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
     * @param boolean $published
     */
    public function setPublished($published) {
        $this->published = $published;
    }

    /**
     * @return boolean
     */
    public function getPublished() {
        return $this->published;
    }

    /**
     * @param string $state
     */
    public function setState($state) {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @param int $teamSize
     */
    public function setTeamSize($teamSize) {
        $this->teamSize = $teamSize;
    }

    /**
     * @return int
     */
    public function getTeamSize() {
        return $this->teamSize;
    }

    /**
     * @param Team[] $teams
     */
    public function setTeams($teams) {
        $this->teams = $teams;
    }

    /**
     * @return Team[]
     */
    public function getTeams() {
        return $this->teams;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("This property is read-only.");
    }

    public function getInputFilter() {
        if ($this->inputFilter == NULL) {
            $this->inputFilter = new TournamentInputFilter();
        }

        return $this->inputFilter;
    }
}