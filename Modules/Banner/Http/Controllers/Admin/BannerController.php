<?php

namespace Modules\Banner\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Banner\Entities\Banner;
use Modules\Banner\Http\Requests\CreateBannerRequest;
use Modules\Banner\Http\Requests\UpdateBannerRequest;
use Modules\Banner\Repositories\BannerRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BannerController extends AdminBaseController
{
    /**
     * @var BannerRepository
     */
    private $banner;

    public function __construct(BannerRepository $banner)
    {
        parent::__construct();

        $this->banner = $banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $banners = $this->banner->all();

        return view('banner::admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('banner::admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBannerRequest $request
     * @return Response
     */
    public function store(CreateBannerRequest $request)
    {
        $credentials_option= $request->all();
        if($credentials_option['medias_single']['image_banner']==null) {
            return back()->withErrors([
                'message' => "Image required"
            ]);
        }
       
        $this->banner->create($request->all());

        return redirect()->route('admin.banner.banner.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('banner::banners.title.banners')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Banner $banner
     * @return Response
     */
    public function edit(Banner $banner)
    {
        return view('banner::admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Banner $banner
     * @param  UpdateBannerRequest $request
     * @return Response
     */
    public function update(Banner $banner, UpdateBannerRequest $request)
    {
        $credentials_option= $request->all();
        if($credentials_option['medias_single']['image_banner']==null) {
            return back()->withErrors([
                'message' => "Image required"
            ]);
        }
        $this->banner->update($banner, $request->all());
        
        return redirect()->route('admin.banner.banner.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('banner::banners.title.banners')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner $banner
     * @return Response
     */
    public function destroy(Banner $banner)
    {
        $this->banner->destroy($banner);

        return redirect()->route('admin.banner.banner.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('banner::banners.title.banners')]));
    }
}
