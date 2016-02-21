<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application;


/**
 * Festa
 *
 * @ORM\Table(name="festa")
 * @ORM\Entity
 */
class Festa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_festa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFesta;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="morada", type="string", length=255, nullable=false)
     */
    
    private $morada;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="gmaps", type="string", length=255, nullable=false)
     */
    private $gmaps;    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="data", type="integer", nullable=false)
     */
    private $data;

    /**
     * @var integer
     *
     * @ORM\Column(name="cor_x", type="integer", nullable=false)
     */
    private $corX;

    /**
     * @var integer
     *
     * @ORM\Column(name="cor_y", type="integer", nullable=false)
     */
    private $corY;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="newimg", type="integer", nullable=false)
     */
    private $newimg;

    /**
     * @var \Lista
     *
     * @ORM\ManyToOne(targetEntity="Lista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_lista", referencedColumnName="ID_lista")
     * })
     */
    private $idLista;

    /**
     * @var \User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_user", referencedColumnName="ID_user")
     * })
     */
    private $idUser;

    /**
     * Get idFesta
     *
     * @return integer 
     */
    public function getIdFesta()
    {
        return $this->idFesta;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Festa
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
     * Set descricao
     *
     * @param string $descricao
     * @return PostBrinde
     */
    public function setDescricao($descricao)
    {
    	$this->descricao = $descricao;
    
    	return $this;
    }
    
    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
    	return $this->descricao;
    }
    
    /**
     * Set morada
     *
     * @param string $morada
     * @return Festa
     */
    public function setMorada($morada)
    {
        $this->morada = $morada;
    
        return $this;
    }

    /**
     * Get morada
     *
     * @return string 
     */
    public function getMorada()
    {
        return $this->morada;
    }
    
    /**
     * Set gmaps
     *
     * @param string $gmaps
     * @return Festa
     */
    public function setGmaps($gmaps)
    {
    	$this->gmaps = $gmaps;
    
    	return $this;
    }
    
    /**
     * Get gmaps
     *
     * @return string
     */
    public function getGmaps()
    {
    	return $this->gmaps;
    }

    /**
     * Set data
     *
     * @param integer $data
     * @return Festa
     */
    public function setData($data)
    {
        $this->data = $data;
    
        return $this;
    }

    /**
     * Get data
     *
     * @return integer 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set corX
     *
     * @param integer $corX
     * @return Festa
     */
    public function setCorX($corX)
    {
        $this->corX = $corX;
    
        return $this;
    }

    /**
     * Get corX
     *
     * @return integer 
     */
    public function getCorX()
    {
        return $this->corX;
    }

    /**
     * Set corY
     *
     * @param integer $corY
     * @return Festa
     */
    public function setCorY($corY)
    {
        $this->corY = $corY;
    
        return $this;
    }

    /**
     * Get corY
     *
     * @return integer 
     */
    public function getCorY()
    {
        return $this->corY;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return Festa
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
     * Set newimg
     *
     * @param integer $newimg
     * @return Festa
     */
    public function setNewimg($newimg)
    {
    	$this->newimg = $newimg;
    
    	return $this;
    }
    
    /**
     * Get newimg
     *
     * @return integer
     */
    public function getNewimg()
    {
    	return $this->newimg;
    }

    /**
     * Set idLista
     *
     * @param \Lista $idLista
     * @return Festa
     */
    public function setIdLista(Application\Entity\Lista $idLista = null)
    {
        $this->idLista = $idLista;
    
        return $this;
    }

    /**
     * Get idLista
     *
     * @return \Lista 
     */
    public function getIdLista()
    {
        return $this->idLista;
    }
    
    /**
     * Set idUser
     *
     * @param \User $idUser
     * @return PostCartaz
     */
    public function setIdUser(Application\Entity\User $idUser)
    {
    	$this->idUser = $idUser;
    
    	return $this;
    }
    
    /**
     * Get idUser
     *
     * @return \User
     */
    public function getIdUser()
    {
    	return $this->idUser;
    }
    
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
