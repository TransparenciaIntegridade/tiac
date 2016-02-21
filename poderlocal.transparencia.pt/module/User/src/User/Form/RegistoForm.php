<?php

namespace User\Form;


use Zend\Form\Form; 
//use Zend\Captcha; 



class RegistoForm extends Form  

{ 
	
	 
	       
	
    public function __construct($name = null) 
    { 
    	  
    	$pubKey = '6LfjHuUSAAAAAHyJmoAo4vLMASwvZFng8MuE1dTH';
    	$privKey = '6LfjHuUSAAAAAGPeKfu7mCKqCzcFk-CtySyR7jCo';
    
        parent::__construct('user/form'); 
        
        $this->setAttribute('method', 'post'); 
        
        $this->add(array(
        		'name' => 'id',
        		'attributes' => array(
        				'type'  => 'hidden',
        		),
        ));
        
        $this->add(array( 
            'name' => 'username', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Digite o seu nome de utilizador', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Username', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'email', 
            'type' => 'Zend\Form\Element\Email', 
            'attributes' => array( 
                'placeholder' => 'Digite o seu email', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Email', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'password', 
            'type' => 'Zend\Form\Element\Password', 
            'attributes' => array( 
                'placeholder' => 'Digite a sua password', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Password', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'password_verify', 
            'type' => 'Zend\Form\Element\Password', 
            'attributes' => array( 
                'placeholder' => 'Digite novamente a sua password', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Verificar Password', 
            ), 
        )); 
             
        
        $this->add(array(
     	'type' => 'Zend\Form\Element\Captcha',
        'name' => 'captcha',
        'options' => array(
            'label' => '',
            'captcha' => array(
                'class' => 'recaptcha',
                'options' => array(
                    'public_key' => $pubKey,
                    'private_key' => $privKey,
                ),
            ),
        ),
    ));
     /* 
        $this->add(array(
        		'type' => 'Zend\Form\Element\Captcha',
        		'name' => 'captcha',
        		'options' => array(
        				'label' => 'Please verify you are human ------------>',
        				'captcha' => new Captcha\dumb(),
        		),
        ));
    */    
        
        
        
        
    
        
        $this->add(array(
        		'name' => 'submit',
        		'type' => 'Zend\Form\Element\Submit'
        		,
        		'options' => array(
        				'label' => '',
        		),
        ));
        
            
 	
        $this->add(array( 
            'name' => 'csrf', 
            'type' => 'Zend\Form\Element\Csrf', 
        ));       
    } 
} 