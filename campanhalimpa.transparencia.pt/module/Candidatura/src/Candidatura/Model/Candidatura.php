<?php

namespace Candidatura\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Candidatura implements InputFilterAwareInterface 
{
    public $id;
    public $camara;
    public $nome;
    public $cor;
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['ID_lista']))     ? $data['ID_lista']     : null;
        $this->camara = (isset($data['ID_camara'])) ? $data['ID_camara'] : null;
        $this->nome  = (isset($data['nome']))  ? $data['nome']  : null;
        $this->cor  = (isset($data['cor']))  ? $data['cor']  : null;
        
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

            

            $inputFilter->add($factory->createInput(array(
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
            )));

           

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}