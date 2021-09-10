<?php

namespace Modules\News\Repositories\Eloquent;

use Modules\News\Repositories\News_categoriesRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Support\Str;

class EloquentNews_categoriesRepository extends EloquentBaseRepository implements News_categoriesRepository
{
    public function create($data)
    {
       foreach($data as $key => $value) {
           if( isset($value['slug']) ) {
                $data[$key]['slug'] = str_slug($value['slug'], '-');
           }
       }
        $news_cat = $this->model->create($data);
        return $news_cat;
    }

    public function update($news_categories, $data)
    {
        foreach($data as $key => $value) {
            if( isset($value['slug']) ) {
                 $data[$key]['slug'] = str_slug($value['slug'], '-');
            }
        }
        $news_categories->update($data);
        return $news_categories;
    }

}
