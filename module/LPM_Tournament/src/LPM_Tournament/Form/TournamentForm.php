<?php

namespace LPM_Tournament\Form;

use LPM_Tournament\Entity\Tournament;
use Zend\Form\Form;

class TournamentForm extends Form {

    protected $objectManager;


    public function __construct($name = null) {
        parent::__construct($name === null ? 'tournament' : $name);

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'name',
            'options' => array(
                'label' => 'Name',
                'column-size' => 'sm-9',
                'label_attributes' => array('class' => 'col-sm-3'),
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'published',
            'options' => array(
                'label' => 'Published',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
                'column-size' => 'sm-9 col-sm-offset-3',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Number',
            'name' => 'teamSize',
            'attributes' => array(
                'min' => '0',
            ),
            'options' => array(
                'label' => 'Team size',
                'column-size' => 'sm-9',
                'label_attributes' => array('class' => 'col-sm-3'),
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'state',
            'options' => array(
                'label' => 'State',
                'value_options' => array(
                        Tournament::STATE_CLOSED => 'Closed',
                        Tournament::STATE_REGISTRATION => 'Open for registration',
                        Tournament::STATE_FINISHED => 'Finished',
                 ),
                'column-size' => 'sm-9',
                'label_attributes' => array('class' => 'col-sm-3'),
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Button',
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn-primary',
            ),
            'options' => array(
                'label' => 'Opslaan',
                'column-size' => 'sm-9 col-sm-offset-3',
            ),
        ));
    }
}