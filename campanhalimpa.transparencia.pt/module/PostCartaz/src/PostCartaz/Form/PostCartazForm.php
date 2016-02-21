<?php


namespace PostCartaz\Form;

use Zend\Form\Form;


class PostCartazForm extends Form
{
	public function __construct($name = null)
	{
		
		// we want to ignore the name passed
		parent::__construct('candidatura');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/form-data');
		
		
	}
}
