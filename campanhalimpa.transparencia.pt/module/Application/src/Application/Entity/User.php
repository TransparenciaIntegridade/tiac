<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_group", type="integer", nullable=false)
     */
    private $userGroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active;
    
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    private $token;


    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set userGroup
     *
     * @param integer $userGroup
     * @return User
     */
    public function setUserGroup($userGroup)
    {
        $this->userGroup = $userGroup;
    
        return $this;
    }

    /**
     * Get userGroup
     *
     * @return integer 
     */
    public function getUserGroup()
    {
        return $this->userGroup;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return User
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
     * Set token
     *
     * @param string $token
     * @return User
     */
    public function setToken($token)
    {
    	$this->token = $token;
    
    	return $this;
    }
    
    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
    	return $this->token;
    }
}
