<?php
namespace Modules\News\Http\Controllers;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\News\Repositories\NewsRepository;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
class PublicController extends BasePublicController {

    private $news;

    public function __construct( NewsRepository $news)
    {
        parent::__construct();
        $this->news = $news;
    }

    public function index() {
        $news = $this->news->paginate(15);
        return view('news.index', compact('news'));
    }
    public function detail($slug)
    {
        $news=$this->news->findBySlug($slug);
        return view('news.detail',compact('news'));
    }
}