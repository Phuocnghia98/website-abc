<?php

namespace Modules\Banner\Events;

use Modules\Media\Contracts\StoringMedia;
use Modules\Banner\Entities\Banner;

class BannerWasUpdated implements StoringMedia
{
    /**
     * @var Banner
     */
    private $banner;
    /**
     * @var array
     */
    private $data;

    public function __construct(Banner $banner, array $data)
    {
        $this->banner = $banner;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->banner;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}