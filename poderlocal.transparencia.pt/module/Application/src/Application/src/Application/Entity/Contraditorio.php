<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Desemprego
 *
 * @ORM\Table(name="desemprego")
 * @ORM\Entity
 */
class Contraditorio
{
    /**
     * @var float
     *
     * @ORM\Column(name="ano2012", type="decimal", nullable=true)
     */
    private $contraditorio_2013;
    private $contraditorio_2014;

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
     * @return Desemprego
     */
    public function setContra2013($contraditorio_2013)
    {
        $this->contraditorio_2013 = $contraditorio_2013;
    
        return $this;
    }

    /**
     * Get contraditorio_2013
     *
     * @return float 
     */
    public function getContra2013()
    {
        return $this->contraditorio_2013;
    }

 /**
     * Set contraditorio_2014
     *
     * @return float 
     */
public function setContra2014($contraditorio_2014)
    {
        $this->contraditorio_2014 = $contraditorio_2014;
    
        return $this;
    }
/**
     * Get contraditorio_2014
     *
     * @return float 
     */

 public function getContra2014()
    {
        return $this->contraditorio_2014;
    }



    /**
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return Desemprego
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
