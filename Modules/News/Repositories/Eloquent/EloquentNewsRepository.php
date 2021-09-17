<?php

namespace Modules\News\Repositories\Eloquent;

use Modules\News\Repositories\NewsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\News\Events\NewsWasCreated;
use Modules\News\Events\NewsWasUpdated;
use Modules\News\Events\NewsWasDeleted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Modules\News\Entities\News;
use Modules\News\Entities\News_categories;
use Modules\News\Entities\News_categoriesTranslation;
use Modules\User\Entities\Sentinel\User;

class EloquentNewsRepository extends EloquentBaseRepository implements NewsRepository
{
    public function create($data)
    {
        $user_id = Auth::user()->id;
        foreach($data as $key => $value) {
            if( isset($value['slug']) ) {
                 $data[$key]['slug'] = str_slug($value['slug'], '-');
                 $data[$key]['user_id'] = $user_id;
            }
        }
       
        $news = $this->model->create($data);
        event(new NewsWasCreated($news, $data));
        return $news;
    }

    public function update($news, $data)
    {
        $user_id = Auth::user()->id;
        foreach($data as $key => $value) {
            if( isset($value['slug']) ) {
                 $data[$key]['slug'] = str_slug($value['slug'], '-');
                 $data[$key]['user_id'] = $user_id;
            }
        }
        $news->update($data);

        event(new NewsWasUpdated($news, $data));

        return $news;
    }

    public function destroy($news)
    {
        event(new NewsWasDeleted($news));

        return $news->delete();
    }
    public function showlimit3($lang)
    {
        return  $this->model->whereHas('translations', function (Builder $q) use ($lang) {
            $q->where('locale', "$lang");
        })->with('translations')->orderBy('created_at', 'DESC')->take(3)->get();
    }
    public function getArrNewsCat() {
        $news_cat = News_categories::all();
        $arr_news_cat=array();
        foreach($news_cat as $value) {
            $arr_news_cat[$value->id] = $value->name;
        }
        return $arr_news_cat;
    }
    public function checkValidateImage($data)
    {
        if($data['medias_single']['image_news']==null) {
            return back()->withErrors([
                'message' => "Image required"
            ]);
        }
    }
    public function getNewsCatLimit10()
    {
        return News_categories::take(10)->get();

    }
}
