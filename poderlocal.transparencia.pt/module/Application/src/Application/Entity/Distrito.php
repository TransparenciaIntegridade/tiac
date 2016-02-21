<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Distrito
 *
 * @ORM\Table(name="distrito")
 * @ORM\Entity
 */
class Distrito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_distrito", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDistrito;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=16, nullable=true)
     */
    private $nome;


    /**
     * Get idDistrito
     *
     * @return integer 
     */
    public function getIdDistrito()
    {
        return $this->idDistrito;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Distrito
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
}
