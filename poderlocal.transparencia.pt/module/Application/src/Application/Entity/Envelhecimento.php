<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Envelhecimento
 *
 * @ORM\Table(name="envelhecimento")
 * @ORM\Entity
 */
class Envelhecimento
{
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
     * Set ano2012
     *
     * @param float $ano2012
     * @return Envelhecimento
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
     * @return Envelhecimento
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
