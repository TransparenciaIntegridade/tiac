<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application;

/**
 * RatingFesta
 *
 * @ORM\Table(name="rating_festa")
 * @ORM\Entity
 */
class RatingFesta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
     */
    private $rating;

    /**
     * @var \Festa
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Festa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_festa", referencedColumnName="ID_festa")
     * })
     */
    private $idFesta;

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
    public function setIdFesta(Application\Entity\Festa $idFesta = null)
    {
        $this->idFesta = $idFesta;
    
        return $this;
    }

    /**
     * Get idBrinde
     *
     * @return \PostBrinde 
     */
    public function getIdFesta()
    {
        return $this->idFesta;
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
