<?php

namespace GoGreat\CMSBaseBundle\Entity;
use GoGreat\CMSBaseBundle\Util\SlugNormalizer;
/**
 * GoGreat\CMSBaseBundle\Entity\Page
 */
class Page
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $slug
     */
    private $slug;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var GoGreat\CMSBaseBundle\Entity\Block
     */
    private $blocks;

    public function __construct()
    {
        $this->blocks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = (string) new SlugNormalizer($slug);
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
    	if($this->slug == null)
    		$this->setSlug($this->getTitle());
    		
        return $this->slug;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Add blocks
     *
     * @param GoGreat\CMSBaseBundle\Entity\Block $blocks
     */
    public function addBlocks(\GoGreat\CMSBaseBundle\Entity\Block $blocks)
    {
        $this->blocks[] = $blocks;
    }

    /**
     * Get blocks
     *
     * @return Doctrine\Common\Collections\Collection $blocks
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
    
    /**
     * Get menu identifier
     * 
     * @return string
     */
    public function getMenuIdentifier()
    {
    	return "page_{$this->getSlug()}";
    }
}