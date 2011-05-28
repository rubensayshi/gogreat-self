<?php

namespace GoGreat\ServerBaseBundle\Entity;

/**
 * GoGreat\ServerBaseBundle\Entity\Website
 */
use Doctrine\Common\Collections\Collection;

class Website
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var GoGreat\ServerBaseBundle\Entity\Domain
     */
    private $domains;

    /**
     * @var GoGreat\ServerBaseBundle\Entity\Server
     */
    private $server;

    /**
     * @var GoGreat\ServerBaseBundle\Entity\Module
     */
    private $modules;

    public function __construct()
    {
        $this->domains = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->modules = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set domains
     *
     * @param array[GoGreat\ServerBaseBundle\Entity\Domain]	$domains
     */
    public function setDomains($domains)
    {
    	foreach ($domains as $domain) {
        	$this->addDomain($domain);
    	}
    }

    /**
     * Add domains
     *
     * @param GoGreat\ServerBaseBundle\Entity\Domain $domain
     */
    public function addDomain(\GoGreat\ServerBaseBundle\Entity\Domain $domain)
    {
    	$domain->setWebsite($this);
        $this->domains[] = $domain;
    }
    
    /**
     * Get domains
     *
     * @return Doctrine\Common\Collections\Collection $domains
     */
    public function getDomains()
    {
        return $this->domains;
    }

    /**
     * Set server
     *
     * @param GoGreat\ServerBaseBundle\Entity\Server $server
     */
    public function setServer(\GoGreat\ServerBaseBundle\Entity\Server $server)
    {
        $this->server = $server;
    }

    /**
     * Get server
     *
     * @return GoGreat\ServerBaseBundle\Entity\Server $server
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Add modules
     *
     * @param GoGreat\ServerBaseBundle\Entity\Module $modules
     */
    public function addModule(\GoGreat\ServerBaseBundle\Entity\Module $module)
    {
        $this->module[] = $module;
    }

    /**
     * Set modules
     *
     * @param Collection[GoGreat\ServerBaseBundle\Entity\Module]	$modules
     */
    public function setModules(Collection $modules)
    {
    	foreach ($modules as $module) {
      		$this->addModule($module);
    	}
    }

    /**
     * Get modules
     *
     * @return Doctrine\Common\Collections\Collection $modules
     */
    public function getModules()
    {
        return $this->modules;
    }
    /**
     * @var GoGreat\UserBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param GoGreat\UserBundle\Entity\User $user
     */
    public function setUser(\GoGreat\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return GoGreat\UserBundle\Entity\User $user
     */
    public function getUser()
    {
        return $this->user;
    }
}