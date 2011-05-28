<?php

namespace GoGreat\ServerBaseBundle\Entity;

/**
 * GoGreat\ServerBaseBundle\Entity\Server
 */
class Server
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $hostname
     */
    private $hostname;

    /**
     * @var GoGreat\ServerBaseBundle\Entity\Website
     */
    private $websites;

    public function __construct()
    {
        $this->websites = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set hostname
     *
     * @param string $hostname
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
    }

    /**
     * Get hostname
     *
     * @return string $hostname
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Add websites
     *
     * @param GoGreat\ServerBaseBundle\Entity\Website $website
     */
    public function addWebsite(\GoGreat\ServerBaseBundle\Entity\Website $website)
    {
        $this->websites[] = $website;
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