<?php

namespace LPM_Tournament\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class TournamentController extends AbstractActionController {

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager() {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction() {
        $tournaments = $this->getEntityManager()->getRepository('\LPM_Tournament\Entity\Tournament')
                ->findBy(array('published' => TRUE), array('id' => 'DESC'));

        return new ViewModel(array(
            'tournaments' => $tournaments
        ));
    }
}