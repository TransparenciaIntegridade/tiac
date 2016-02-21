<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ranking
 *
 * @ORM\Table(name="ranking")
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
     * @ORM\Column(name="ITM_2014", type="string", length=7, nullable=true)
     */
    private $itm_2014;

     /**
     * @var string
     *
     * @ORM\Column(name="ITM_2015", type="string", length=7, nullable=true)
     */
    private $itm_2015;


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
     * @ORM\Column(name="Ranking_2014", type="integer", nullable=true)
     */
    private $ranking_2014;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ranking_2015", type="integer", nullable=true)
     */
    private $ranking_2015;
    



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
     * @var integer
     *
     * @ORM\Column(name="DimensaoA_2014", type="integer", nullable=true)
     */
  private $dimensaoA_2014;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoB_2014", type="integer", nullable=true)
     */
    private $dimensaoB_2014;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoC_2014", type="integer", nullable=true)
     */
    private $dimensaoC_2014;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoD_2014", type="integer", nullable=true)
     */
    private $dimensaoD_2014;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoE_2014", type="integer", nullable=true)
     */
    private $dimensaoE_2014;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoF_2014", type="integer", nullable=true)
     */
    private $dimensaoF_2014;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoG_2014", type="integer", nullable=true)
     */
    private $dimensaoG_2014;


    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoA_2015", type="integer", nullable=true)
     */
  private $dimensaoA_2015;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoB_2015", type="integer", nullable=true)
     */
    private $dimensaoB_2015;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoC_2015", type="integer", nullable=true)
     */
    private $dimensaoC_2015;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoD_2015", type="integer", nullable=true)
     */
    private $dimensaoD_2015;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoE_2015", type="integer", nullable=true)
     */
    private $dimensaoE_2015;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoF_2015", type="integer", nullable=true)
     */
    private $dimensaoF_2015;

    /**
     * @var integer
     *
     * @ORM\Column(name="DimensaoG_2015", type="integer", nullable=true)
     */
    private $dimensaoG_2015;








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
     * Set itm
     *
     * @param string $itm
     * @return Ranking
     */
    public function setItm_2014($itm_2014)
    {
        $this->itm_2014 = $itm_2014;
    
        return $this;
    }

    /**
     * Get itm
     *
     * @return string 
     */
    public function getItm_2014()
    {
        return $this->itm_2014;
    }


    /**
     * Set itm
     *
     * @param string $itm
     * @return Ranking
     */
    public function setItm_2015($itm_2015)
    {
        $this->itm_2015 = $itm_2015;
    
        return $this;
    }

    /**
     * Get itm
     *
     * @return string 
     */
    public function getItm_2015()
    {
        return $this->itm_2015;
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
     * Set ranking
     *
     * @param integer $ranking
     * @return Ranking
     */
    public function setRanking2014($ranking_2014)
    {
        $this->ranking_2014 = $ranking_2014;
    
        return $this;
    }

    /**
     * Get ranking
     *
     * @return integer 
     */
    public function getRanking_2014()
    {
        return $this->ranking_2014;
    }

/**
     * Set ranking
     *
     * @param integer $ranking
     * @return Ranking
     */
    public function setRanking2015($ranking_2015)
    {
        $this->ranking_2015 = $ranking_2015;
    
        return $this;
    }

    /**
     * Get ranking
     *
     * @return integer 
     */
    public function getRanking_2015()
    {
        return $this->ranking_2015;
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





     /**
     * Set dimensaoA_2014
     *
     * @param integer $dimensaoA_2014
     * @return Ranking
     */
    public function setDimensaoA_2014($dimensaoA_2014)
    {
        $this->dimensaoA_2014 = $dimensaoA_2014;
    
        return $this;
    }

    /**
     * Get dimensaoA_2014
     *
     * @return integer 
     */
    public function getDimensaoA_2014()
    {
        return $this->dimensaoA_2014;
    }

    /**
     * Set dimensaoB_2014
     *
     * @param integer $dimensaoB_2014
     * @return Ranking
     */
    public function setDimensaoB_2014($dimensaoB_2014)
    {
        $this->dimensaoB_2014 = $dimensaoB_2014;
    
        return $this;
    }

    /**
     * Get dimensaoB_2014
     *
     * @return integer 
     */
    public function getDimensaoB_2014()
    {
        return $this->dimensaoB_2014;
    }

    /**
     * Set dimensaoC_2014
     *
     * @param integer $dimensaoC
     * @return Ranking
     */
    public function setDimensaoC_2014($dimensaoC_2014)
    {
        $this->dimensaoC_2014 = $dimensaoC_2014;
    
        return $this;
    }

    /**
     * Get dimensaoC_2014
     *
     * @return integer 
     */
    public function getDimensaoC_2014()
    {
        return $this->dimensaoC_2014;
    }

    /**
     * Set dimensaoD_2014
     *
     * @param integer $dimensaoD_2014
     * @return Ranking
     */
    public function setDimensaoD_2014($dimensaoD_2014)
    {
        $this->dimensaoD_2014 = $dimensaoD_2014;
    
        return $this;
    }

    /**
     * Get dimensaoD_2014
     *
     * @return integer 
     */
    public function getDimensaoD_2014()
    {
        return $this->dimensaoD_2014;
    }

    /**
     * Set dimensaoE
     *
     * @param integer $dimensaoE
     * @return Ranking
     */
    public function setDimensaoE_2014($dimensaoE_2014)
    {
        $this->dimensaoE_2014 = $dimensaoE_2014;
    
        return $this;
    }

    /**
     * Get dimensaoE_2014
     *
     * @return integer 
     */
    public function getDimensaoE_2014()
    {
        return $this->dimensaoE_2014;
    }

    /**
     * Set dimensaoF_2014
     *
     * @param integer $dimensaoF
     * @return Ranking
     */
    public function setDimensaoF_2014($dimensaoF_2014)
    {
        $this->dimensaoF_2014 = $dimensaoF_2014;
    
        return $this;
    }

    /**
     * Get dimensaoF_2014
     *
     * @return integer 
     */
    public function getDimensaoF_2014()
    {
        return $this->dimensaoF_2014;
    }

    /**
     * Set dimensaoG_2014
     *
     * @param integer $dimensaoG_2014
     * @return Ranking
     */
    public function setDimensaoG_2014($dimensaoG_2014)
    {
        $this->dimensaoG_2014 = $dimensaoG_2014;
    
        return $this;
    }

    /**
     * Get dimensaoG_2014
     *
     * @return integer_2014 
     */
    public function getDimensaoG_2014()
    {
        return $this->dimensaoG_2014;
    }

    




/*-----------------------------------------------2015----------------------------------*/




 /**
     * Set dimensaoA_2015
     *
     * @param integer $dimensaoA_2015
     * @return Ranking
     */
    public function setDimensaoA_2015($dimensaoA_2015)
    {
        $this->dimensaoA_2015 = $dimensaoA_2015;
    
        return $this;
    }

    /**
     * Set dimensaoB_2015
     *
     * @param integer $dimensaoB_2015
     * @return Ranking
     */
    public function setDimensaoB_2015($dimensaoB_2015)
    {
        $this->dimensaoB_2015 = $dimensaoB_2015;
    
        return $this;
    }

    /**
     * Get dimensaoB_2015
     *
     * @return integer 
     */
    public function getDimensaoB_2015()
    {
        return $this->dimensaoB_2015;
    }



    /**
     * Set dimensaoC_2015
     *
     * @param integer $dimensaoC_2015
     * @return Ranking
     */
    public function setDimensaoC_2015($dimensaoC_2015)
    {
        $this->dimensaoC_2015 = $dimensaoC_2015;
    
        return $this;
    }

    /**
     * Get dimensaoC_2015
     *
     * @return integer 
     */
    public function getDimensaoC_2015()
    {
        return $this->dimensaoC_2015;
    }


    /**
     * Set dimensaoD_2015
     *
     * @param integer $dimensaoD_2015
     * @return Ranking
     */
    public function setDimensaoD_2015($dimensaoD_2015)
    {
        $this->dimensaoD_2015 = $dimensaoD_2015;
    
        return $this;
    }

    /**
     * Get dimensaoD_2015
     *
     * @return integer 
     */
    public function getDimensaoD_2015()
    {
        return $this->dimensaoD_2015;
    }


    /**
     * Set dimensaoE_2015
     *
     * @param integer $dimensaoE_2015
     * @return Ranking
     */
    public function setDimensaoE_2015($dimensaoE_2015)
    {
        $this->dimensaoE_2015 = $dimensaoE_2015;
    
        return $this;
    }

    /**
     * Get dimensaoE_2015
     *
     * @return integer 
     */
    public function getDimensaoE_2015()
    {
        return $this->dimensaoE_2015;
    }
   

    /**
     * Set dimensaoF_2015
     *
     * @param integer $dimensaoF_2015
     * @return Ranking
     */
    public function setDimensaoF_2015($dimensaoF_2015)
    {
        $this->dimensaoF_2015 = $dimensaoF_2015;
    
        return $this;
    }

    /**
     * Get dimensaoF_2015
     *
     * @return integer 
     */
    public function getDimensaoF_2015()
    {
        return $this->dimensaoF_2015;
    }



    /**
     * Set dimensaoG_2015
     *
     * @param integer $dimensaoG_2015
     * @return Ranking
     */
    public function setDimensaoG_2015($dimensaoG_2015)
    {
        $this->dimensaoG_2015 = $dimensaoG_2015;
    
        return $this;
    }

    /**
     * Get dimensaoG_2015
     *
     * @return integer 
     */
    public function getDimensaoG_2015()
    {
        return $this->dimensaoG_2015;
    }




}
