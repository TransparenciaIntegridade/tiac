<?php


namespace Candidatura\Form;

use Zend\Form\Form;


class IndependenteForm extends Form
{
	public function __construct($name = null)
	{
		
		// we want to ignore the name passed
		parent::__construct('candidatura');
		$this->setAttribute('method', 'post');
		
		
		
		$this->add(array(
				'name' => 'nome',
				'attributes' => array(
						'type'  => 'text',
				),
				'options' => array(
						'label' => 'nome do movimento Independente',
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
