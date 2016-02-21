<?php 
// File: UploadForm.php

namespace Festa\Form;

use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;

class FestaForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->setAttribute('enctype','multipart/form-data');
        $this->addElements();
        $this->addInputFilter();
    }

    public function addElements()
    {
    	//text input
    	$this->add(array(
    			'name' => 'nome',
    			'attributes' => array(
    					'type'  => 'text',
    					'required' => 'required',
    					'placeholder' => 'Digite um titulo',
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
    	
    	//text input
    	$this->add(array(
    			'name' => 'morada',
    			'attributes' => array(
    					'type'  => 'text',
    					'required' => 'required',
    					'placeholder' => 'Digite uma morada',
    			),
    			'options' => array(
    					'label' => 'Morada',
    			),
    	));
    	
    	
    	// File Input
    	$file = new Element\File('image-file');
    	$file->setLabel('Upload Imagem')
    	->setAttribute('id', 'image-file')
    	->setAttribute('required', 'required')
    	->setAttribute('multiple', true);
    	$this->add($file);
    	
    	
    	$this->add(array(
    			'name' => 'submit',
    			'attributes' => array(
    					'type'  => 'submit',
    					'value' => 'Enviar',
    					'id' => 'submitbutton',
    			),
    	));
    	
    	
        
    }

    public function addInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();
        
        
        $nome = new InputFilter\Input('nome');
        $nome->setRequired(true);
        
        $nome->getValidatorChain()->addByName('StringLength' , array('encoding' => 'UTF-8',
        														     'min' => 1,
        															 'max' => 100, 
        															 ));
        $nome->getFilterChain()->attachByName('StripTags','StringTrim');
        
        
        $morada = new InputFilter\Input('morada');
        $morada->setRequired(true);
        
        $morada->getValidatorChain()->addByName('StringLength' , array('encoding' => 'UTF-8',
        		'min' => 1,
        		'max' => 100,
        ));
        $morada->getFilterChain()->attachByName('StripTags','StringTrim');
        
       
		/*
        // File Input
        $fileInput = new InputFilter\FileInput('image-file');
        $fileInput->setRequired(true);

        // You only need to define validators and filters
        // as if only one file was being uploaded. All files
        // will be run through the same validators and filters
        // automatically.
        $fileInput->getValidatorChain()
            ->attachByName('filesize',      array('max' => 4096000))
            //->attachByName('filemimetype',  array('mimeType' => 'image/png,image/x-png,image/jpg,image/x-jpg'))
            ;
		*/
        // All files will be renamed, i.e.:
        //   ./data/tmpuploads/avatar_4b3403665fea6.png,
        //   ./data/tmpuploads/avatar_5c45147660fb7.png
        
        
        $inputFilter->add($nome);
        $inputFilter->add($morada);
       // $inputFilter->add($fileInput);
		
        
        $this->setInputFilter($inputFilter);
    }
}