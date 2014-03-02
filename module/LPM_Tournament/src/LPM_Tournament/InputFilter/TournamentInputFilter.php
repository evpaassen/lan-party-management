<?php

namespace LPM_Tournament\InputFilter;


use LPM_Tournament\Entity\Tournament;
use Zend\InputFilter\InputFilter;

class TournamentInputFilter extends InputFilter {

    public function __construct() {
        $this->add(array(
            'name'      => 'name',
            'required'  => true,
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 255,
                    ),
                ),
            ),
        ));

        $this->add(array(
            'name'      => 'published',
            'required'  => false,
            'filters'   => array(
                array(
                    'name' => 'Boolean',
                    'type' => \Zend\Filter\Boolean::TYPE_ZERO_STRING,
                ),
            ),
        ));

        $this->add(array(
            'name'      => 'teamSize',
            'required'  => true,
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'Int',
                ),
            ),
        ));

        $this->add(array(
            'name'      => 'state',
            'required'  => true,
            'validators' => array(
                array(
                    'name'    => 'InArray',
                    'options' => array(
                        'haystack' => array(
                            Tournament::STATE_CLOSED,
                            Tournament::STATE_REGISTRATION,
                            Tournament::STATE_FINISHED
                        ),
                    )
                ),
            ),
        ));
    }
}