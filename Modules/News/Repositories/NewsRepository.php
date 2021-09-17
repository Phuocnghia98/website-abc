<?php

namespace Modules\News\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface NewsRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function showlimit3($lang);
    public function getArrNewsCat();
    public function checkValidateImage($data);
    public function getNewsCatLimit10();
}
