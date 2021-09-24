<?php

namespace Modules\Uiweb\Repositories\Cache;

use Modules\Uiweb\Repositories\FooterRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFooterDecorator extends BaseCacheDecorator implements FooterRepository
{
    public function __construct(FooterRepository $footer)
    {
        parent::__construct();
        $this->entityName = 'uiweb.footers';
        $this->repository = $footer;
    }
}
