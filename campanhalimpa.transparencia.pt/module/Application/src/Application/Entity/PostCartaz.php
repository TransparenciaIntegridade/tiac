<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application;

/**
 * PostCartaz
 *
 * @ORM\Table(name="post_cartaz")
 * @ORM\Entity
 */
class PostCartaz
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_post", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPost;

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
     * @ORM\Column(name="morada", type="string", length=255, nullable=true)
     */
    private $morada;
    

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
     * @var integer
     *
     * @ORM\Column(name="proximity", type="integer", nullable=false)
     */
    private $proximity;

    /**
     * @var \Lista
     *
     * @ORM\OneToOne(targetEntity="Lista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_lista", referencedColumnName="ID_lista")
     * })
     */
    private $idLista;

    /**
     * @var \Cartaz
     *
     * @ORM\OneToOne(targetEntity="Cartaz")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_cartaz", referencedColumnName="ID_cartaz")
     * })
     */
    private $idCartaz;

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
     * Set idPost
     *
     * @param integer $idPost
     * @return PostCartaz
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    
        return $this;
    }

    /**
     * Get idPost
     *
     * @return integer 
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set data
     *
     * @param integer $data
     * @return PostCartaz
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
     * @return PostCartaz
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
     * Set morada
     *
     * @param string $morada
     * @return PostCartaz
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
     * Set corX
     *
     * @param string $corX
     * @return PostCartaz
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
     * @return PostCartaz
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
     * Set proximity
     *
     * @param integer $proximity
     * @return PostCartaz
     */
    public function setProximity($proximty)
    {
    	$this->proximity = $proximty;
    
    	return $this;
    }
    
    /**
     * Get proximity
     *
     * @return integer
     */
    public function getProximity()
    {
    	return $this->proximity;
    }

    /**
     * Set idLista
     *
     * @param \Lista $idLista
     * @return PostCartaz
     */
    public function setIdLista(Application\Entity\Lista $idLista) 
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
     * Set idCartaz
     *
     * @param \Cartaz $idCartaz
     * @return PostCartaz
     */
    public function setIdCartaz(Application\Entity\Cartaz $idCartaz)
    {
        $this->idCartaz = $idCartaz;
    
        return $this;
    }

    /**
     * Get idCartaz
     *
     * @return \Cartaz 
     */
    public function getIdCartaz()
    {
        return $this->idCartaz;
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
