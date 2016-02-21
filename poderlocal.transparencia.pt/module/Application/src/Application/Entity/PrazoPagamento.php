<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrazoPagamento
 *
 * @ORM\Table(name="prazo_pagamento")
 * @ORM\Entity
 */
class PrazoPagamento
{
    /**
     * @var string
     *
     * @ORM\Column(name="ano2010", type="string", length=5, nullable=true)
     */
    private $ano2010;

    /**
     * @var integer
     *
     * @ORM\Column(name="ano2011", type="integer", nullable=true)
     */
    private $ano2011;

    /**
     * @var string
     *
     * @ORM\Column(name="ano2012", type="string", length=5, nullable=true)
     */
    private $ano2012;

    /**
     * @var \Camara
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Camara")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_camara", referencedColumnName="ID_camara")
     * })
     */
    private $idCamara;


    /**
     * Set ano2010
     *
     * @param string $ano2010
     * @return PrazoPagamento
     */
    public function setAno2010($ano2010)
    {
        $this->ano2010 = $ano2010;
    
        return $this;
    }

    /**
     * Get ano2010
     *
     * @return string 
     */
    public function getAno2010()
    {
        return $this->ano2010;
    }

    /**
     * Set ano2011
     *
     * @param integer $ano2011
     * @return PrazoPagamento
     */
    public function setAno2011($ano2011)
    {
        $this->ano2011 = $ano2011;
    
        return $this;
    }

    /**
     * Get ano2011
     *
     * @return integer 
     */
    public function getAno2011()
    {
        return $this->ano2011;
    }

    /**
     * Set ano2012
     *
     * @param string $ano2012
     * @return PrazoPagamento
     */
    public function setAno2012($ano2012)
    {
        $this->ano2012 = $ano2012;
    
        return $this;
    }

    /**
     * Get ano2012
     *
     * @return string 
     */
    public function getAno2012()
    {
        return $this->ano2012;
    }

    /**
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return PrazoPagamento
     */
    public function setIdCamara(\Camara $idCamara)
    {
        $this->idCamara = $idCamara;
    
        return $this;
    }

    /**
     * Get idCamara
     *
     * @return \Camara 
     */
    public function getIdCamara()
    {
        return $this->idCamara;
    }
}
