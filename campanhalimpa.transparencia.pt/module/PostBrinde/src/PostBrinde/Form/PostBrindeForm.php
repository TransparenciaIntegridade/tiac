<?php

namespace PostBrinde\Form;

use Zend\Form\Form;

class PostBrindeForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('PostBrinde');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/form-data');
		$this->add(array(
				'name' => 'nome',
				'attributes' => array(
						'type'  => 'text',
						'required' => 'required',
						'placeholder' => 'Digite um nome',
				),
				'options' => array(
						'label' => 'Nome',
				),
		));
		$this->add(array(
				'name' => 'descricao',
				'attributes' => array(
						'type'  => 'textarea',
						'placeholder' => utf8_encode('Digite uma breve descrição acerca do brinde'),
				),
				'options' => array(
						'label' => utf8_encode('Descrição'),
				),
		));
		
		$this->add(array(
				'name' => 'image',
				'attributes' => array(
						'type'  => 'file', 
				),
				'options' => array(
						'label' => 'Upload do Brinde',
				),
		));
		
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Enviar',
						'id' => 'submitbutton',
				),
		));
	}
}