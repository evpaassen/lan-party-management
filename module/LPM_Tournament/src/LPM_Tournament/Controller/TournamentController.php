<?php

namespace LPM_Tournament\Controller;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use LPM_Tournament\Entity\Tournament;
use LPM_Tournament\Form\TournamentForm;
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

    public function addAction() {
        $tournament = new Tournament();

        $form = new TournamentForm();
        $form->setAttribute('method', 'post');

        $form->setHydrator(new DoctrineHydrator($this->getEntityManager()));
        $form->bind($tournament);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getEntityManager()->persist($tournament);
                $this->getEntityManager()->flush();

                return $this->redirect()->toRoute('lpm_tournament/default',
                    array('controller' => 'tournament', 'action' => 'show', 'id' => $tournament->getId()));
            }
        }

        return array('form' => $form);
    }
}