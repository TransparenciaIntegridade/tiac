<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ranking
 *
 * @ORM\Table(name="ranking_2014")
 * @ORM\Entity
 */
class Ranking
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
     * @ORM\Column(name="Municipios", type="string", length=27, nullable=true)
     */
    private $municipios;

    /**
     * @var string
     *
     * @ORM\Column(name="ITM", type="string", length=7, nullable=true)
     */
    private $itm;

    /**
     * @var string
     *
     * @ORM\Column(name="Icone", type="text", nullable=false)
     */
    private $icone;

    /**
     * @var string
     *
     * @ORM\Column(name="Url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ranking", type="integer", nullable=true)
     */
    private $ranking;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoA", type="integer", nullable=true)
     */
    private $dimensaoA;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoB", type="integer", nullable=true)
     */
    private $dimensaoB;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoC", type="integer", nullable=true)
     */
    private $dimensaoC;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoD", type="integer", nullable=true)
     */
    private $dimensaoD;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoE", type="integer", nullable=true)
     */
    private $dimensaoE;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoF", type="integer", nullable=true)
     */
    private $dimensaoF;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoG", type="integer", nullable=true)
     */
    private $dimensaoG;


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
     * Set municipios
     *
     * @param string $municipios
     * @return Ranking
     */
    public function setMunicipios($municipios)
    {
        $this->municipios = $municipios;
    
        return $this;
    }

    /**
     * Get municipios
     *
     * @return string 
     */
    public function getMunicipios()
    {
        return $this->municipios;
    }

    /**
     * Set itm
     *
     * @param string $itm
     * @return Ranking
     */
    public function setItm($itm)
    {
        $this->itm = $itm;
    
        return $this;
    }

    /**
     * Get itm
     *
     * @return string 
     */
    public function getItm()
    {
        return $this->itm;
    }

    /**
     * Set icone
     *
     * @param string $icone
     * @return Ranking
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;
    
        return $this;
    }

    /**
     * Get icone
     *
     * @return string 
     */
    public function getIcone()
    {
        return $this->icone;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Ranking
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set ranking
     *
     * @param integer $ranking
     * @return Ranking
     */
    public function setRanking($ranking)
    {
        $this->ranking = $ranking;
    
        return $this;
    }

    /**
     * Get ranking
     *
     * @return integer 
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * Set dimensaoA
     *
     * @param integer $dimensaoA
     * @return Ranking
     */
    public function setDimensaoA($dimensaoA)
    {
        $this->dimensaoA = $dimensaoA;
    
        return $this;
    }

    /**
     * Get dimensaoA
     *
     * @return integer 
     */
    public function getDimensaoA()
    {
        return $this->dimensaoA;
    }

    /**
     * Set dimensaoB
     *
     * @param integer $dimensaoB
     * @return Ranking
     */
    public function setDimensaoB($dimensaoB)
    {
        $this->dimensaoB = $dimensaoB;
    
        return $this;
    }

    /**
     * Get dimensaoB
     *
     * @return integer 
     */
    public function getDimensaoB()
    {
        return $this->dimensaoB;
    }

    /**
     * Set dimensaoC
     *
     * @param integer $dimensaoC
     * @return Ranking
     */
    public function setDimensaoC($dimensaoC)
    {
        $this->dimensaoC = $dimensaoC;
    
        return $this;
    }

    /**
     * Get dimensaoC
     *
     * @return integer 
     */
    public function getDimensaoC()
    {
        return $this->dimensaoC;
    }

    /**
     * Set dimensaoD
     *
     * @param integer $dimensaoD
     * @return Ranking
     */
    public function setDimensaoD($dimensaoD)
    {
        $this->dimensaoD = $dimensaoD;
    
        return $this;
    }

    /**
     * Get dimensaoD
     *
     * @return integer 
     */
    public function getDimensaoD()
    {
        return $this->dimensaoD;
    }

    /**
     * Set dimensaoE
     *
     * @param integer $dimensaoE
     * @return Ranking
     */
    public function setDimensaoE($dimensaoE)
    {
        $this->dimensaoE = $dimensaoE;
    
        return $this;
    }

    /**
     * Get dimensaoE
     *
     * @return integer 
     */
    public function getDimensaoE()
    {
        return $this->dimensaoE;
    }

    /**
     * Set dimensaoF
     *
     * @param integer $dimensaoF
     * @return Ranking
     */
    public function setDimensaoF($dimensaoF)
    {
        $this->dimensaoF = $dimensaoF;
    
        return $this;
    }

    /**
     * Get dimensaoF
     *
     * @return integer 
     */
    public function getDimensaoF()
    {
        return $this->dimensaoF;
    }

    /**
     * Set dimensaoG
     *
     * @param integer $dimensaoG
     * @return Ranking
     */
    public function setDimensaoG($dimensaoG)
    {
        $this->dimensaoG = $dimensaoG;
    
        return $this;
    }

    /**
     * Get dimensaoG
     *
     * @return integer 
     */
    public function getDimensaoG()
    {
        return $this->dimensaoG;
    }
}
