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
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idCamara;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=27, nullable=true)
     */
    private $nome;

    /**
     * @var \Distrito
     *
     * @ORM\OneToOne(targetEntity="Distrito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_distrito", referencedColumnName="ID_distrito")
     * })
     */
    private $idDistrito;


    /**
     * Set idCamara
     *
     * @param integer $idCamara
     * @return Camara
     */
    public function setIdCamara($idCamara)
    {
        $this->idCamara = $idCamara;
    
        return $this;
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
     * Set idDistrito
     *
     * @param \Distrito $idDistrito
     * @return Camara
     */
    public function setIdDistrito(Distrito $idDistrito)
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
