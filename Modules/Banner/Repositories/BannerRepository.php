<?php

namespace Modules\Banner\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface BannerRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function showAll($lang);
}
