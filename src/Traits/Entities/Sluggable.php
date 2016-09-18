<?php

namespace CarMaintenance\Traits\Entities;

/**
 * Class Sluggable.
 */
trait Sluggable
{
    /**
     * @var string
     */
    private $slug;

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = str_slug($slug);
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
