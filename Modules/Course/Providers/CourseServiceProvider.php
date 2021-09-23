<?php

namespace Modules\Course\Providers;

use Modules\Course\Composers\CourseComposer;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Course\Events\Handlers\RegisterCourseSidebar;

class CourseServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterCourseSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('coursecates', array_dot(trans('course::coursecates')));
            $event->load('courses', array_dot(trans('course::courses')));
            $event->load('teachers', array_dot(trans('course::teachers')));
            // append translations



        });
        view()->composer('home', CourseComposer::class);
    }

    public function boot()
    {
        $this->publishConfig('course', 'permissions');

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
            'Modules\Course\Repositories\CourseCateRepository',
            function () {
                $repository = new \Modules\Course\Repositories\Eloquent\EloquentCourseCateRepository(new \Modules\Course\Entities\CourseCate());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Course\Repositories\Cache\CacheCourseCateDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Course\Repositories\CourseRepository',
            function () {
                $repository = new \Modules\Course\Repositories\Eloquent\EloquentCourseRepository(new \Modules\Course\Entities\Course());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Course\Repositories\Cache\CacheCourseDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Course\Repositories\TeacherRepository',
            function () {
                $repository = new \Modules\Course\Repositories\Eloquent\EloquentTeacherRepository(new \Modules\Course\Entities\Teacher());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Course\Repositories\Cache\CacheTeacherDecorator($repository);
            }
        );
// add bindings



    }
}
