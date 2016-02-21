<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnsinoSuperior
 *
 * @ORM\Table(name="ensino_superior")
 * @ORM\Entity
 */
class EnsinoSuperior
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ano2011", type="integer", nullable=true)
     */
    private $ano2011;

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
     * Set ano2011
     *
     * @param integer $ano2011
     * @return EnsinoSuperior
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
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return EnsinoSuperior
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
