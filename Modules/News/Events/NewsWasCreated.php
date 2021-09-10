<?php

namespace Modules\News\Events;

use Modules\Media\Contracts\StoringMedia;
use Modules\News\Entities\News;

class NewsWasCreated implements StoringMedia
{
    /**
     * @var News
     */
    private $news;
    /**
     * @var array
     */
    private $data;

    public function __construct(News $news, array $data)
    {
        $this->news = $news;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->news;
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