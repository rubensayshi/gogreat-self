<?php

namespace GoGreat\CMSBaseBundle\Entity;
use GoGreat\CMSBaseBundle\Util\SlugNormalizer;

/**
 * GoGreat\CMSBaseBundle\Entity\NewsArticle
 */
class NewsArticle
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
     * @var text $image
     */
    private $image;

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
        
    	if($this->slug == null)
    		$this->setSlug($this->getTitle());
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
     * Set image
     *
     * @param text $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return text $image
     */
    public function getImage()
    {
        return $this->image;
    }
}