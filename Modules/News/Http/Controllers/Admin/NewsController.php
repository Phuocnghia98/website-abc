<?php

namespace Modules\News\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\CreateNewsRequest;
use Modules\News\Http\Requests\UpdateNewsRequest;
use Modules\News\Repositories\NewsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\News\Entities\News_categories;
use Modules\User\Entities\Sentinel\User;
use Illuminate\Support\Facades\App;

class NewsController extends AdminBaseController
{
    /**
     * @var NewsRepository
     */
    private $news;

    public function __construct(NewsRepository $news)
    {
        parent::__construct();

        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = $this->news->all();
        return view('news::admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $news_cat = News_categories::all();
        $arr_news_cat=array();
        foreach($news_cat as $value) {
            $arr_news_cat[$value->id] = $value->name;
        }
        return view('news::admin.news.create', compact('arr_news_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNewsRequest $request
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $credentials_option= $request->all();
        if($credentials_option['medias_single']['image_news']==null) {
            return back()->withErrors([
                'message' => "Image required"
            ]);
        }
        $this->news->create($request->all());

        return redirect()->route('admin.news.news.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('news::news.title.news')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function edit(News $news)
    {
        $news_cat = News_categories::all();
        $arr_news_cat=array();
        foreach($news_cat as $value) {
            $arr_news_cat[$value->id] = $value->name;
        }
        return view('news::admin.news.edit', compact('news','arr_news_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  News $news
     * @param  UpdateNewsRequest $request
     * @return Response
     */
    public function update(News $news, UpdateNewsRequest $request)
    {
        $credentials_option= $request->all();
        if($credentials_option['medias_single']['image_news']==null) {
            return back()->withErrors([
                'message' => "Image required"
            ]);
        }
        $this->news->update($news, $request->all());

        return redirect()->route('admin.news.news.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('news::news.title.news')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        $this->news->destroy($news);

        return redirect()->route('admin.news.news.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('news::news.title.news')]));
    }
}
