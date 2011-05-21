<?php

namespace GoGreat\ServerBaseBundle\Entity;

/**
 * GoGreat\ServerBaseBundle\Entity\Domain
 */
class Domain
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $domain
     */
    private $domain;

    /**
     * @var GoGreat\ServerBaseBundle\Entity\Website
     */
    private $website;


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
     * Set domain
     *
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * Get domain
     *
     * @return string $domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set website
     *
     * @param GoGreat\ServerBaseBundle\Entity\Website $website
     */
    public function setWebsite(\GoGreat\ServerBaseBundle\Entity\Website $website)
    {
        $this->website = $website;
    }

    /**
     * Get website
     *
     * @return GoGreat\ServerBaseBundle\Entity\Website $website
     */
    public function getWebsite()
    {
        return $this->website;
    }
}