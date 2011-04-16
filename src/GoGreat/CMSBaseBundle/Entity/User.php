<?php

namespace GoGreat\CMSBaseBundle\Entity;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * GoGreat\CMSBaseBundle\Entity\User
 */
class User implements UserInterface
{
    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $email
     */
    private $email;


    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    function getRoles()
    {
    	return array('ROLE_ADMIN');
    }
    
    function getSalt()
    {
    	return '';
    }
    
    function eraseCredentials() 
    {
    	$this->password = '';	
    }
    
    function equals(UserInterface $user)
    {
    	return $user->getUsername() == $this->getUsername();
    }
}