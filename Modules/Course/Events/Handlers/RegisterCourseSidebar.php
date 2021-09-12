<?php

namespace Modules\Course\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterCourseSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('course::courses.title.courses'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('course::coursecates.title.coursecates'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.course.coursecate.create');
                    $item->route('admin.course.coursecate.index');
                    $item->authorize(
                        $this->auth->hasAccess('course.coursecates.index')
                    );
                });
                $item->item(trans('course::courses.title.courses'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.course.course.create');
                    $item->route('admin.course.course.index');
                    $item->authorize(
                        $this->auth->hasAccess('course.courses.index')
                    );
                });
                $item->item(trans('course::teachers.title.teachers'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.course.teacher.create');
                    $item->route('admin.course.teacher.index');
                    $item->authorize(
                        $this->auth->hasAccess('course.teachers.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
