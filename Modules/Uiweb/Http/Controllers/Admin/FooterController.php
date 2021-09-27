<?php

namespace Modules\Uiweb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Uiweb\Entities\Footer;
use Modules\Uiweb\Http\Requests\CreateFooterRequest;
use Modules\Uiweb\Http\Requests\UpdateFooterRequest;
use Modules\Uiweb\Repositories\FooterRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FooterController extends AdminBaseController
{
    /**
     * @var FooterRepository
     */
    private $footer;

    public function __construct(FooterRepository $footer)
    {
        parent::__construct();

        $this->footer = $footer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $footer = $this->footer->getFirstDataFooter();
        if(empty($footer)) return view('uiweb::admin.footers.create');
        return view('uiweb::admin.footers.edit', compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('uiweb::admin.footers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFooterRequest $request
     * @return Response
     */
    public function store(CreateFooterRequest $request)
    {
        $this->footer->create($request->all());

        return redirect()->route('admin.uiweb.footer.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('uiweb::footers.title.footers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Footer $footer
     * @return Response
     */
    public function edit(Footer $footer)
    {
        return view('uiweb::admin.footers.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Footer $footer
     * @param  UpdateFooterRequest $request
     * @return Response
     */
    public function update(Footer $footer, UpdateFooterRequest $request)
    {
        $this->footer->update($footer, $request->all());

        return redirect()->route('admin.uiweb.footer.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('uiweb::footers.title.footers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Footer $footer
     * @return Response
     */
    public function destroy(Footer $footer)
    {
        $this->footer->destroy($footer);

        return redirect()->route('admin.uiweb.footer.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('uiweb::footers.title.footers')]));
    }

    public function editlogo() {
        $logo = $this->footer->getFirstDataFooter();
        if(empty($logo)) return view('uiweb::admin.footers.create');
        return view('uiweb::admin.logo.edit', compact('logo'));
    }

    public function updatelogo(Request $request)
    {
      
        $logo = $this->footer->updateLogo($request->all() );

        return redirect()->route('admin.uiweb.logo.editlogo')->with('logo', $logo)
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('uiweb::footers.title.footers')]));
    }
}
