<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartaz
 *
 * @ORM\Table(name="cartaz")
 * @ORM\Entity
 */
class Cartaz
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_cartaz", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCartaz;

    /**
     * @var string
     *
     * @ORM\Column(name="tamanho", type="string", length=255, nullable=false)
     */
    private $tamanho;

    /**
     * @var string
     *
     * @ORM\Column(name="preco", type="string", length=255, nullable=false)
     */
    private $preco;


    /**
     * Get idCartaz
     *
     * @return integer 
     */
    public function getIdCartaz()
    {
        return $this->idCartaz;
    }

    /**
     * Set tamanho
     *
     * @param string $tamanho
     * @return Cartaz
     */
    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;
    
        return $this;
    }

    /**
     * Get tamanho
     *
     * @return string 
     */
    public function getTamanho()
    {
        return $this->tamanho;
    }

    /**
     * Set preco
     *
     * @param string $preco
     * @return Cartaz
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    
        return $this;
    }

    /**
     * Get preco
     *
     * @return string 
     */
    public function getPreco()
    {
        return $this->preco;
    }
}
