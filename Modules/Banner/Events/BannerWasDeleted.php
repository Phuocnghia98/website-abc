<?php

namespace Modules\Banner\Events;

use Modules\Media\Contracts\DeletingMedia;
use Modules\Banner\Entities\Banner;

class BannerWasDeleted implements DeletingMedia
{
    /**
     * @var Banner
     */
    private $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->banner->id;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->banner);
    }
}