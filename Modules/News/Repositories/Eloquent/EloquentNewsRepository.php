<?php

namespace Modules\News\Repositories\Eloquent;

use Modules\News\Repositories\NewsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\News\Events\NewsWasCreated;
use Modules\News\Events\NewsWasUpdated;
use Modules\News\Events\NewsWasDeleted;
use Illuminate\Support\Facades\Auth;
class EloquentNewsRepository extends EloquentBaseRepository implements NewsRepository
{
    public function all() {
       
        if (method_exists($this->model, 'translations')) {
            return $this->model->with('translations')
            // ->join('users', 'news__news_translations.user_id', '=', 'users.id')
            // ->join('news__news_categories_translations', 'news__news_translations.cat_id', '=', 'news__news_categories_translations.news_categories_id')
            ->orderBy('created_at', 'DESC')->get();
            
        }
        
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

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
}
