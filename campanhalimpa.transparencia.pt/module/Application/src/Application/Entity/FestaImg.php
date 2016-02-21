<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application;

/**
 * FestaImg
 *
 * @ORM\Table(name="festa_img")
 * @ORM\Entity
 */
class FestaImg
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_image", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idImage;

    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="string", length=255, nullable=false)
     */
    private $imagem;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active;

    /**
     * @var \Festa
     *
     * @ORM\ManyToOne(targetEntity="Festa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_festa", referencedColumnName="ID_festa")
     * })
     */
    private $idFesta;


    /**
     * Get idImage
     *
     * @return integer 
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     * @return FestaImg
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    
        return $this;
    }

    /**
     * Get imagem
     *
     * @return string 
     */
    public function getImagem()
    {
        return $this->imagem;
    }
    
    /**
     * Set active
     *
     * @param integer $active
     * @return PostCartaz
     */
    public function setActive($active)
    {
    	$this->active = $active;
    
    	return $this;
    }
    
    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
    	return $this->active;
    }

    /**
     * Set idFesta
     *
     * @param \Festa $idFesta
     * @return FestaImg
     */
    public function setIdFesta(Application\Entity\Festa $idFesta)
    {
        $this->idFesta = $idFesta;
    
        return $this;
    }

    /**
     * Get idFesta
     *
     * @return \Festa 
     */
    public function getIdFesta()
    {
        return $this->idFesta;
    }
}
