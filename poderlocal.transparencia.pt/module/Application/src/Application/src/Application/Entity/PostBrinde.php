<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application;

/**
 * PostBrinde
 *
 * @ORM\Table(name="post_brinde")
 * @ORM\Entity
 */
class PostBrinde
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_brinde", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBrinde;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="data", type="bigint", nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="cor_x", type="string", length=255, nullable=true)
     */
    private $corX;

    /**
     * @var string
     *
     * @ORM\Column(name="cor_y", type="string", length=255, nullable=true)
     */
    private $corY;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active;

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
     * Get idBrinde
     *
     * @return integer 
     */
    public function getIdBrinde()
    {
        return $this->idBrinde;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return PostBrinde
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
     * Set data
     *
     * @param integer $data
     * @return PostBrinde
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
     * Set image
     *
     * @param string $image
     * @return PostBrinde
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set corX
     *
     * @param string $corX
     * @return PostBrinde
     */
    public function setCorX($corX)
    {
        $this->corX = $corX;
    
        return $this;
    }

    /**
     * Get corX
     *
     * @return string 
     */
    public function getCorX()
    {
        return $this->corX;
    }

    /**
     * Set corY
     *
     * @param string $corY
     * @return PostBrinde
     */
    public function setCorY($corY)
    {
        $this->corY = $corY;
    
        return $this;
    }

    /**
     * Get corY
     *
     * @return string 
     */
    public function getCorY()
    {
        return $this->corY;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return PostBrinde
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
     * Set idLista
     *
     * @param \Lista $idLista
     * @return PostBrinde
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
