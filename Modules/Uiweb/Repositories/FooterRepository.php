<?php

namespace Modules\Uiweb\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface FooterRepository extends BaseRepository
{
    public function getFirstDataFooter();
    public function updateLogo($data);
}
