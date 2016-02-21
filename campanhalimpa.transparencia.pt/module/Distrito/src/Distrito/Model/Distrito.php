<?php

namespace Distrito\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Distrito implements InputFilterAwareInterface
{
    public $id;
    public $nome;
    
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['ID_distrito']))     ? $data['ID_distrito']     : null;
        $this->distrito = (isset($data['nome'])) ? $data['nome'] : null;
        
        
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

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}