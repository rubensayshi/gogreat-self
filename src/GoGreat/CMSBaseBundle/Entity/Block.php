<?php

namespace GoGreat\CMSBaseBundle\Entity;

/**
 * GoGreat\CMSBaseBundle\Entity\Block
 */
class Block
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
     * @var GoGreat\CMSBaseBundle\Entity\Page
     */
    private $page;


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
        $this->slug = $slug;
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
     * Set page
     *
     * @param GoGreat\CMSBaseBundle\Entity\Page $page
     */
    public function setPage(\GoGreat\CMSBaseBundle\Entity\Page $page)
    {
        $this->page = $page;
    }

    /**
     * Get page
     *
     * @return GoGreat\CMSBaseBundle\Entity\Page $page
     */
    public function getPage()
    {
        return $this->page;
    }
}