<?php

namespace Modules\News\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\News\Entities\News_categories;
use Modules\News\Http\Requests\CreateNews_categoriesRequest;
use Modules\News\Http\Requests\UpdateNews_categoriesRequest;
use Modules\News\Repositories\News_categoriesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class News_categoriesController extends AdminBaseController
{
    /**
     * @var News_categoriesRepository
     */
    private $news_categories;

    public function __construct(News_categoriesRepository $news_categories)
    {
        parent::__construct();

        $this->news_categories = $news_categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news_categories = $this->news_categories->all();

        return view('news::admin.news_categories.index', compact('news_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('news::admin.news_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNews_categoriesRequest $request
     * @return Response
     */
    public function store(CreateNews_categoriesRequest $request)
    {
        
        $this->news_categories->create($request->all());

        return redirect()->route('admin.news.news_categories.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('news::news_categories.title.news_categories')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News_categories $news_categories
     * @return Response
     */
    public function edit(News_categories $news_categories)
    {
        return view('news::admin.news_categories.edit', compact('news_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  News_categories $news_categories
     * @param  UpdateNews_categoriesRequest $request
     * @return Response
     */
    public function update(News_categories $news_categories, UpdateNews_categoriesRequest $request)
    {
        $this->news_categories->update($news_categories, $request->all());

        return redirect()->route('admin.news.news_categories.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('news::news_categories.title.news_categories')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News_categories $news_categories
     * @return Response
     */
    public function destroy(News_categories $news_categories)
    {
        $this->news_categories->destroy($news_categories);

        return redirect()->route('admin.news.news_categories.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('news::news_categories.title.news_categories')]));
    }
}
