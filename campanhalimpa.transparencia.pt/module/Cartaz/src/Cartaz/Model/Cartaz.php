<?php

namespace Cartaz\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Cartaz implements InputFilterAwareInterface
{
    public $id;
    public $tamanho;
    public $preco;
    
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['ID_cartaz']))     ? $data['ID_cartaz']     : null;
        $this->tamanho = (isset($data['tamanho'])) ? $data['tamanho'] : null;
        $this->preco = (isset($data['preco'])) ? $data['preco'] : null;
        
        
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