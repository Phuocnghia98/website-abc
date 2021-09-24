<?php

namespace Modules\Uiweb\Events;

use Modules\Media\Contracts\StoringMedia;
use Modules\Uiweb\Entities\Footer;

class LogoWasCreated implements StoringMedia
{
    /**
     * @var Uiweb
     */
    private $logo;
    /**
     * @var array
     */
    private $data;

    public function __construct(Footer $logo, array $data)
    {
        $this->logo = $logo;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->logo;
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