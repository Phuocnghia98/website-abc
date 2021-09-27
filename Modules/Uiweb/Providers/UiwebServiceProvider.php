<?php

namespace Modules\Uiweb\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Uiweb\Composers\FooterComposer;
use Modules\Uiweb\Events\Handlers\RegisterUiwebSidebar;

class UiwebServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterUiwebSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('footers', array_dot(trans('uiweb::footers')));
            // append translations
         
        });
        view()->composer('partials/footer', FooterComposer::class);
    }

    public function boot()
    {
        $this->publishConfig('uiweb', 'permissions');

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
            'Modules\Uiweb\Repositories\FooterRepository',
            function () {
                $repository = new \Modules\Uiweb\Repositories\Eloquent\EloquentFooterRepository(new \Modules\Uiweb\Entities\Footer());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Uiweb\Repositories\Cache\CacheFooterDecorator($repository);
            }
        );
// add bindings

    }
}
