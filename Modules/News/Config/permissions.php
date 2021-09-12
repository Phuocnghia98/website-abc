<?php

return [
    'news.news_categories' => [
        'index' => 'news::news_categories.list resource',
        'create' => 'news::news_categories.create resource',
        'edit' => 'news::news_categories.edit resource',
        'destroy' => 'news::news_categories.destroy resource',
    ],
    'news.news' => [
        'index' => 'news::news.list resource',
        'create' => 'news::news.create resource',
        'edit' => 'news::news.edit resource',
        'destroy' => 'news::news.destroy resource',
    ],
// append


];
