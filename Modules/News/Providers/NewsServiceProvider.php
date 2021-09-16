<?php

namespace Modules\News\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\News\Events\Handlers\RegisterNewsSidebar;
use Modules\News\Composers\NewsComposer;

class NewsServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterNewsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('news_categories', array_dot(trans('news::news_categories')));
            $event->load('news', array_dot(trans('news::news')));
            // append translations


        });
        view()->composer('home', NewsComposer::class);
    }

    public function boot()
    {
        $this->publishConfig('news', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\News\Repositories\News_categoriesRepository',
            function () {
                $repository = new \Modules\News\Repositories\Eloquent\EloquentNews_categoriesRepository(new \Modules\News\Entities\News_categories());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\News\Repositories\Cache\CacheNews_categoriesDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\News\Repositories\NewsRepository',
            function () {
                $repository = new \Modules\News\Repositories\Eloquent\EloquentNewsRepository(new \Modules\News\Entities\News());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\News\Repositories\Cache\CacheNewsDecorator($repository);
            }
        );
// add bindings


    }
}
