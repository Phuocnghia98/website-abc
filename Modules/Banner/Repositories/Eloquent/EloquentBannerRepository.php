<?php

namespace Modules\Banner\Repositories\Eloquent;

use Modules\Banner\Repositories\BannerRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Banner\Events\BannerWasCreated;
use Modules\Banner\Events\BannerWasUpdated;
use Modules\Banner\Events\BannerWasDeleted;

class EloquentBannerRepository extends EloquentBaseRepository implements BannerRepository
{
    public function create($data)
    {
        $banner = $this->model->create($data);
        event(new BannerWasCreated($banner, $data));
        return $banner;
    }

    public function update($banner, $data)
    {
        $banner->update($data);

        event(new BannerWasUpdated($banner, $data));

        return $banner;
    }

    public function destroy($banner)
    {
        event(new BannerWasDeleted($banner));

        return $banner->delete();
    }
}
