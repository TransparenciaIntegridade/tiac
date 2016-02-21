<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application;


/**
 * RatingBrinde
 *
 * @ORM\Table(name="rating_brinde")
 * @ORM\Entity
 */
class RatingBrinde
{

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
     */
    private $rating;

    /**
     * @var \PostBrinde
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="PostBrinde")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_brinde", referencedColumnName="ID_brinde")
     * })
     */
    private $idBrinde;

    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
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
     * @return RatingBrinde
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
     * Set rating
     *
     * @param integer $rating
     * @return RatingBrinde
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    
        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set idBrinde
     *
     * @param \PostBrinde $idBrinde
     * @return RatingBrinde
     */
    public function setIdBrinde(Application\Entity\PostBrinde $idBrinde = null)
    {
        $this->idBrinde = $idBrinde;
    
        return $this;
    }

    /**
     * Get idBrinde
     *
     * @return \PostBrinde 
     */
    public function getIdBrinde()
    {
        return $this->idBrinde;
    }

    /**
     * Set idUser
     *
     * @param \User $idUser
     * @return RatingBrinde
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
}
