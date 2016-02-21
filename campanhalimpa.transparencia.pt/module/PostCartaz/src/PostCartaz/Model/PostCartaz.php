<?php

namespace PostCartaz\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class PostCartaz implements InputFilterAwareInterface
{
    public $id;
    public $id_user;
    public $id_cartaz;
    public $id_lista;
    public $data ;
    public $image;
    public $x_cor;
    public $y_cor;
    public $active;
    
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['ID_post']))     ? $data['ID_post']     : null;
        $this->id_user     = (isset($data['ID_user']))     ? $data['ID_user']     : null;
        $this->id_cartaz   = (isset($data['ID_cartaz']))     ? $data['ID_cartaz']     : null;
        $this->id_lista     = (isset($data['ID_lista']))     ? $data['ID_lista']     : null;
        $this->data    = (isset($data['data']))     ? $data['data']     : null;
        $this->image = (isset($data['image'])) ? $data['image'] : null;
        $this->x_cor = (isset($data['x_cor'])) ? $data['x_cor'] : null;
        $this->y_cor = (isset($data['y_cor'])) ? $data['x_cor'] : null;
        $this->active = (isset($data['active'])) ? $data['active'] : null;
        
        
    }

     // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this); 
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            
           $inputFilter->add(
            		$factory->createInput(array(
            				'name'     => 'nome',
            				'required' => true,
            				'filters'  => array(
            						array('name' => 'StripTags'),
            						array('name' => 'StringTrim'),
            				),
            				'validators' => array(
            						array(
            								'name'    => 'StringLength',
            								'options' => array(
            										'encoding' => 'UTF-8',
            										'min'      => 1,
            										'max'      => 100,
            								),
            						),
            				),
            		))
            );
            
            $inputFilter->add(
            		$factory->createInput(array(
            				'name'     => 'fileupload',
            				'required' => true,
            		))
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}