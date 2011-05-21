<?php

namespace GoGreat\ServerBaseBundle\Entity;

/**
 * GoGreat\ServerBaseBundle\Entity\Website
 */
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
     * Add domains
     *
     * @param GoGreat\ServerBaseBundle\Entity\Domain $domains
     */
    public function addDomains(\GoGreat\ServerBaseBundle\Entity\Domain $domains)
    {
        $this->domains[] = $domains;
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
    public function addModules(\GoGreat\ServerBaseBundle\Entity\Module $modules)
    {
        $this->modules[] = $modules;
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
}