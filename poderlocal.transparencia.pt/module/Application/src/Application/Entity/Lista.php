<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lista
 *
 * @ORM\Table(name="lista")
 * @ORM\Entity
 */
class Lista
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_lista", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLista;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_camara", type="integer", nullable=true)
     */
    private $idCamara;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=18, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=8, nullable=true)
     */
    private $cor;

    /**
     * @var integer
     *
     * @ORM\Column(name="ano_inicial_poder", type="integer", nullable=true)
     */
    private $anoInicialPoder;

    /**
     * @var integer
     *
     * @ORM\Column(name="ano_final_poder", type="integer", nullable=true)
     */
    private $anoFinalPoder;


    /**
     * Get idLista
     *
     * @return integer 
     */
    public function getIdLista()
    {
        return $this->idLista;
    }

    /**
     * Set idCamara
     *
     * @param integer $idCamara
     * @return Lista
     */
    public function setIdCamara($idCamara)
    {
        $this->idCamara = $idCamara;
    
        return $this;
    }

    /**
     * Get idCamara
     *
     * @return integer 
     */
    public function getIdCamara()
    {
        return $this->idCamara;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Lista
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cor
     *
     * @param string $cor
     * @return Lista
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    
        return $this;
    }

    /**
     * Get cor
     *
     * @return string 
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set anoInicialPoder
     *
     * @param integer $anoInicialPoder
     * @return Lista
     */
    public function setAnoInicialPoder($anoInicialPoder)
    {
        $this->anoInicialPoder = $anoInicialPoder;
    
        return $this;
    }

    /**
     * Get anoInicialPoder
     *
     * @return integer 
     */
    public function getAnoInicialPoder()
    {
        return $this->anoInicialPoder;
    }

    /**
     * Set anoFinalPoder
     *
     * @param integer $anoFinalPoder
     * @return Lista
     */
    public function setAnoFinalPoder($anoFinalPoder)
    {
        $this->anoFinalPoder = $anoFinalPoder;
    
        return $this;
    }

    /**
     * Get anoFinalPoder
     *
     * @return integer 
     */
    public function getAnoFinalPoder()
    {
        return $this->anoFinalPoder;
    }
}
