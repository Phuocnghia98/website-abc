<?php

namespace Modules\Uiweb\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterUiwebSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('uiweb::uiwebs.title.uiwebs'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('uiweb::footers.title.footers'), function (Item $item) {
                    $item->icon('fa fa-lastfm');
                    $item->weight(0);
                    $item->route('admin.uiweb.footer.index');
                    $item->authorize(
                        $this->auth->hasAccess('uiweb.footers.index')
                    );
                });
                $item->item(trans('uiweb::footers.title.logo'), function (Item $item) {
                    $item->icon('fa fa-sun-o');
                    $item->weight(0);
                    $item->route('admin.uiweb.logo.editlogo');
                    $item->authorize(
                        $this->auth->hasAccess('uiweb.footers.index')
                    );
                });

            });
        });

        return $menu;
    }
}
