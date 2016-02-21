<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application;

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
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="orcamento", type="string", length=255, nullable=true)
     */
    private $orcamento;    
    
    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=255, nullable=false)
     */
    private $cor;

    /**
     * @var \Camara
     *
     * @ORM\ManyToOne(targetEntity="Camara")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_camara", referencedColumnName="ID_camara")
     * })
     */
    private $idCamara;


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
     * Set orcamento
     *
     * @param float $orcamento
     * @return Lista
     */
    public function setOrcamento($orcamento)
    {
    	$this->orcamento = $orcamento;
    
    	return $this;
    }
    
    /**
     * Get orcamento
     *
     * @return float
     */
    public function getOrcamento()
    {
    	return $this->orcamento;
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
     * Set idCamara
     *
     * @param \Camara $idCamara
     * @return Lista
     */
    public function setIdCamara(Application\Entity\Camara $idCamara = null)
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
