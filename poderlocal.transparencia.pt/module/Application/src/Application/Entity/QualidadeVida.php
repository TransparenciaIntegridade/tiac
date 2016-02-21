<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QualidadeVida
 *
 * @ORM\Table(name="qualidade_vida")
 * @ORM\Entity
 */
class QualidadeVida
{
    /**
     * @var float
     *
     * @ORM\Column(name="ano2009", type="decimal", nullable=true)
     */
    private $ano2009;

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
     * Set ano2009
     *
     * @param float $ano2009
     * @return QualidadeVida
     */
    public function setAno2009($ano2009)
    {
        $this->ano2009 = $ano2009;
    
        return $this;
    }

    /**
     * Get ano2009
     *
     * @return float 
     */
    public function getAno2009()
    {
        return $this->ano2009;
    }

    /**
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return QualidadeVida
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
