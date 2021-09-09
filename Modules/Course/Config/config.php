<?php

return [
    'name' => 'Course',
               
                    /*
                    |--------------------------------------------------------------------------
                    | Partials to include on page views
                    |--------------------------------------------------------------------------
                    | List the partials you wish to include on the different type page views
                    | The content of those fields well be caught by the PostWasCreated and PostWasEdited events
                    */
                    'partials' => [
                        'translatable' => [
                            'create' => [],
                            'edit' => [],
                        ],
                        'normal' => [
                            'create' => [],
                            'edit' => [],
                        ],
                    ]
                   
                    ];

