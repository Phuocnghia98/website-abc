<?php

namespace Modules\Contact\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Http\Controllers\BasePublicController;
use Yajra\DataTables\Utilities\Request;
use Modules\Contact\Entities\Contact;



class PublicController extends BasePublicController
{
    /**
     * @var ContactRepository
     */
    private $contact;

    public function __construct(ContactRepository $contact)
    {
        parent::__construct();

        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function index(Request $request)
    {
        
        $contact = new Contact;
        $contact->name = $request->post('name');
        $contact->phone = $request->post('phone');
        $contact->save();
        // dd($request);
        return response()->json(['success'=>'Form is successfully submitted!']);
        
    }

    
}


