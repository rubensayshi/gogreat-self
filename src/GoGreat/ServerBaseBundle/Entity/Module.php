<?php

namespace GoGreat\ServerBaseBundle\Entity;

/**
 * GoGreat\ServerBaseBundle\Entity\Module
 */
class Module
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