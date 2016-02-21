<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Camara
 *
 * @ORM\Table(name="camara")
 * @ORM\Entity
 */
class Camara
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_camara", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCamara;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=27, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="brasao", type="string", length=255, nullable=false)
     */
    private $brasao;

    /**
     * @var float
     *
     * @ORM\Column(name="taxa_desemprego", type="float", nullable=false)
     */
    private $taxaDesemprego;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_eleitores", type="integer", nullable=false)
     */
    private $numeroEleitores;

    /**
     * @var boolean
     *
     * @ORM\Column(name="limite_mandatos", type="boolean", nullable=false)
     */
    private $limiteMandatos;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_presidente", type="string", length=255, nullable=false)
     */
    private $nomePresidente;

    /**
     * @var string
     *
     * @ORM\Column(name="qualidade_vida", type="string", length=255, nullable=false)
     */
    private $qualidadeVida;

    /**
     * @var \Distrito
     *
     * @ORM\ManyToOne(targetEntity="Distrito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_distrito", referencedColumnName="ID_distrito")
     * })
     */
    private $idDistrito;


   


/**
     * @var integer
     *
     * @ORM\Column(name="contraditorio_2014", type="integer", nullable=false)
     */
private $contraditorio;

public function setContraditorio($contraditorio)
    {
        $this->contraditorio = $contraditorio;
    
        return $this;
    }





 public function getContraditorio()
    {
        return $this->contraditorio;
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
     * @return Camara
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
     * Set brasao
     *
     * @param string $brasao
     * @return Camara
     */
    public function setBrasao($brasao)
    {
        $this->brasao = $brasao;
    
        return $this;
    }

    /**
     * Get brasao
     *
     * @return string 
     */
    public function getBrasao()
    {
        return $this->brasao;
    }

    /**
     * Set taxaDesemprego
     *
     * @param float $taxaDesemprego
     * @return Camara
     */
    public function setTaxaDesemprego($taxaDesemprego)
    {
        $this->taxaDesemprego = $taxaDesemprego;
    
        return $this;
    }

    /**
     * Get taxaDesemprego
     *
     * @return float 
     */
    public function getTaxaDesemprego()
    {
        return $this->taxaDesemprego;
    }

    /**
     * Set numeroEleitores
     *
     * @param integer $numeroEleitores
     * @return Camara
     */
    public function setNumeroEleitores($numeroEleitores)
    {
        $this->numeroEleitores = $numeroEleitores;
    
        return $this;
    }

    /**
     * Get numeroEleitores
     *
     * @return integer 
     */
    public function getNumeroEleitores()
    {
        return $this->numeroEleitores;
    }

    /**
     * Set limiteMandatos
     *
     * @param boolean $limiteMandatos
     * @return Camara
     */
    public function setLimiteMandatos($limiteMandatos)
    {
        $this->limiteMandatos = $limiteMandatos;
    
        return $this;
    }

    /**
     * Get limiteMandatos
     *
     * @return boolean 
     */
    public function getLimiteMandatos()
    {
        return $this->limiteMandatos;
    }

    /**
     * Set nomePresidente
     *
     * @param string $nomePresidente
     * @return Camara
     */
    public function setNomePresidente($nomePresidente)
    {
        $this->nomePresidente = $nomePresidente;
    
        return $this;
    }

    /**
     * Get nomePresidente
     *
     * @return string 
     */
    public function getNomePresidente()
    {
        return $this->nomePresidente;
    }

    /**
     * Set qualidadeVida
     *
     * @param string $qualidadeVida
     * @return Camara
     */
    public function setQualidadeVida($qualidadeVida)
    {
        $this->qualidadeVida = $qualidadeVida;
    
        return $this;
    }

    /**
     * Get qualidadeVida
     *
     * @return string 
     */
    public function getQualidadeVida()
    {
        return $this->qualidadeVida;
    }

    /**
     * Set idDistrito
     *
     * @param \Distrito $idDistrito
     * @return Camara
     */
    public function setIdDistrito(Distrito $idDistrito = null)
    {
        $this->idDistrito = $idDistrito;
    
        return $this;
    }

    /**
     * Get idDistrito
     *
     * @return \Distrito 
     */
    public function getIdDistrito()
    {
        return $this->idDistrito;
    }
}
