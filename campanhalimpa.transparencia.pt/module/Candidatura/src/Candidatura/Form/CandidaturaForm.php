<?php


namespace Candidatura\Form;

use Zend\Form\Form;


class CandidaturaForm extends Form
{
	public function __construct($name = null)
	{
		
		// we want to ignore the name passed
		parent::__construct('candidatura');
		$this->setAttribute('method', 'post');
		
		$this->add(array(
             'type' => 'Zend\Form\Element\Select',
             'name' => 'nome',
             'options' => array(
                     'label' => 'Lista',
                     'value_options' => array(
                             'PS' => 'PS',
                             'PSD' => 'PSD',
                             'CDS-PP' => 'CDS-PP',
                             'PCP' => 'PCP',
                     		 'BE' => 'BE',
                     ),
             )
     	));
		
		$this->add(array(
				'name' => 'orca',
				'attributes' => array(
						'type'  => 'text',
				),
				'options' => array(
						'label' => 'Orca',
				),
		));
		
		
		/*$this->add(array(
				'name' => 'cor',
				'attributes' => array(
						'type'  => 'text',
				),
				'options' => array(
						'label' => 'cor',
				),
		));*/
		
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Go',
						'id' => 'submitbutton',
				),
		));
	}
}
