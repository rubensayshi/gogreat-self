<?php

namespace GoGreat\UserBundle\Entity;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * GoGreat\UserBundle\Entity\User
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
     * @var array $roles
     */
    private $roles;

    /**
     * @var GoGreat\UserBundle\Entity\Address
     */
    private $addresses;
    
    /**
     * @var GoGreat\ServerBaseBundle\Entity\Website
     */
    private $websites;

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

    /**
     * Set roles
     *
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Get roles
     *
     * @return array $roles
     */
    public function getRoles()
    {
        return $this->roles;
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
    
    /**
     * Add addresses
     *
     * @param GoGreat\UserBundle\Entity\Address $addresses
     */
    public function addAddresses(\GoGreat\UserBundle\Entity\Address $addresses)
    {
        $this->addresses[] = $addresses;
    }

    /**
     * Get addresses
     *
     * @return Doctrine\Common\Collections\Collection $addresses
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Add websites
     *
     * @param GoGreat\ServerBaseBundle\Entity\Website $websites
     */
    public function addWebsites(\GoGreat\ServerBaseBundle\Entity\Website $websites)
    {
        $this->websites[] = $websites;
    }

    /**
     * Get websites
     *
     * @return Doctrine\Common\Collections\Collection $websites
     */
    public function getWebsites()
    {
        return $this->websites;
    }
}