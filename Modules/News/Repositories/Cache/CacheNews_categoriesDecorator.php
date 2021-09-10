<?php

namespace Modules\News\Repositories\Cache;

use Modules\News\Repositories\News_categoriesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheNews_categoriesDecorator extends BaseCacheDecorator implements News_categoriesRepository
{
    public function __construct(News_categoriesRepository $news_categories)
    {
        parent::__construct();
        $this->entityName = 'news.news_categories';
        $this->repository = $news_categories;
    }
}
