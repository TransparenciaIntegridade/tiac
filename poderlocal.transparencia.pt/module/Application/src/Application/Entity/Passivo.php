<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passivo
 *
 * @ORM\Table(name="passivo")
 * @ORM\Entity
 */
class Passivo
{
    /**
     * @var string
     *
     * @ORM\Column(name="ano2010", type="string", length=15, nullable=true)
     */
    private $ano2010;
   /**
     * @var string
     *
     * @ORM\Column(name="ano2011", type="string", length=15, nullable=true)
     */
    private $ano2011;

    
    /**
     * @var string
     *
     * @ORM\Column(name="ano2012", type="string", length=15, nullable=true)
     */
    private $ano2012;

    /**
     * @var string
     *
     * @ORM\Column(name="ano2013", type="string", length=13, nullable=true)
     */
    private $ano2013;

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
     * @return Passivo
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
     * @param string $ano2011
     * @return Passivo
     */
    public function setAno2011($ano2011)
    {
        $this->ano2011 = $ano2011;
    
        return $this;
    }

    /**
     * Get ano2011
     *
     * @return string 
     */
    public function getAno2011()
    {
        return $this->ano2011;
    }

/**
     * Set ano2012
     *
     * @param string $ano2012
     * @return Passivo
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
     * Set ano2013
     *
     * @param string $ano2013
     * @return Passivo
     */
    public function setAno2013($ano2013)
    {
        $this->ano2013 = $ano2013;
    
        return $this;
    }

    /**
     * Get ano2013
     *
     * @return string 
     */
    public function getAno2013()
    {
        return $this->ano2013;
    }

    /**
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return Passivo
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
