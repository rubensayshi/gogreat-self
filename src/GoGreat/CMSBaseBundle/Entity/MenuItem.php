<?php

namespace GoGreat\CMSBaseBundle\Entity;

/**
 * GoGreat\CMSBaseBundle\Entity\MenuItem
 */
class MenuItem
{
    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $routing
     */
    private $routing;

    /**
     * @var array $arguments
     */
    private $arguments;

    public function __construct()
    {
    	$this->weight = 0;
    }
    
    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set routing
     *
     * @param string $routing
     */
    public function setRouting($routing)
    {
        $this->routing = $routing;
    }

    /**
     * Get routing
     *
     * @return string $routing
     */
    public function getRouting()
    {
        return $this->routing;
    }

    /**
     * Set arguments
     *
     * @param array $arguments
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * Get arguments
     *
     * @return array $arguments
     */
    public function getArguments()
    {
        return $this->arguments;
    }
    /**
     * @var string $identifier
     */
    private $identifier;


    /**
     * Set identifier
     *
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Get identifier
     *
     * @return string $identifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
    
    public function fixIdentifier($addSuffix=false)
    {    	
    	if($this->identifier == null)
    		$this->identifier = $this->generateIdentifier();
    	else if($addSuffix)
    		$this->identifier .= '_';
    		
    	return $this->identifier;
    }
    
    protected function generateIdentifier()
    {
    	$identifier = "generated_{$this->routing}_{$this->title}";
    	    	
    	return $identifier;
    }
    /**
     * @var integer $weight
     */
    private $weight;


    /**
     * Set weight
     *
     * @param integer $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get weight
     *
     * @return int $weight
     */
    public function getWeight()
    {
        return $this->weight;
    }
}