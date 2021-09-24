<?php

namespace Modules\Uiweb\Repositories\Eloquent;

use Modules\Uiweb\Repositories\FooterRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Modules\Uiweb\Entities\Footer;
use Modules\Uiweb\Events\LogoWasUpdated;

class EloquentFooterRepository extends EloquentBaseRepository implements FooterRepository
{
    public function getFirstDataFooter()
    {
        return Footer::first();
    }

    public function updateLogo($data)
    {
        $footer = $this->getFirstDataFooter();
        event(new LogoWasUpdated($footer, $data));
        return $footer;
    }
}
