<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Populacao
 *
 * @ORM\Table(name="populacao")
 * @ORM\Entity
 */
class Populacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ano2012", type="integer", nullable=true)
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
     * @param integer $ano2012
     * @return Populacao
     */
    public function setAno2012($ano2012)
    {
        $this->ano2012 = $ano2012;
    
        return $this;
    }

    /**
     * Get ano2012
     *
     * @return integer 
     */
    public function getAno2012()
    {
        return $this->ano2012;
    }

    /**
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return Populacao
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
