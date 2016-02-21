<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indepedencia
 *
 * @ORM\Table(name="indepedencia")
 * @ORM\Entity
 */
class Indepedencia
{
    /**
     * @var float
     *
     * @ORM\Column(name="ano2010", type="decimal", nullable=true)
     */
    private $ano2010;

    /**
     * @var float
     *
     * @ORM\Column(name="ano2011", type="decimal", nullable=true)
     */
    private $ano2011;

    /**
     * @var float
     *
     * @ORM\Column(name="ano2012", type="decimal", nullable=true)
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
     * @param float $ano2010
     * @return Indepedencia
     */
    public function setAno2010($ano2010)
    {
        $this->ano2010 = $ano2010;
    
        return $this;
    }

    /**
     * Get ano2010
     *
     * @return float 
     */
    public function getAno2010()
    {
        return $this->ano2010;
    }

    /**
     * Set ano2011
     *
     * @param float $ano2011
     * @return Indepedencia
     */
    public function setAno2011($ano2011)
    {
        $this->ano2011 = $ano2011;
    
        return $this;
    }

    /**
     * Get ano2011
     *
     * @return float 
     */
    public function getAno2011()
    {
        return $this->ano2011;
    }

    /**
     * Set ano2012
     *
     * @param float $ano2012
     * @return Indepedencia
     */
    public function setAno2012($ano2012)
    {
        $this->ano2012 = $ano2012;
    
        return $this;
    }

    /**
     * Get ano2012
     *
     * @return float 
     */
    public function getAno2012()
    {
        return $this->ano2012;
    }

    /**
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return Indepedencia
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
