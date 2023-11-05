<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Contracts\DesignContract;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Controllers\BaseController;
use Mail;
use Auth;

class DesignController extends BaseController
{
    /**
     * @var DesignContract
     */
    protected $designRepository;


    /**
     * DesignController constructor.
     * @param DesignContract $designRepository
     */
    public function __construct(DesignContract $designRepository)
    {
        $this->designRepository = $designRepository;
        
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        $designs = $this->designRepository->listDesigns();
        $this->setPageTitle('My Designs', 'List of all uploaded designs');
        return view('artist.design.index', compact('designs'));
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Design', 'Create Design');

        return view('artist.design.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'image'     =>  'required|mimes:jpg,jpeg,png|max:1000',
            'description'     =>  'required|max:1000',
        ]);

        $params = $request->except('_token');
        $params['user_id'] = Auth::user()->id;
        
        $design = $this->designRepository->createDesign($params);

        if (!$design) {
            return $this->responseRedirectBack('Error occurred while creating design.', 'error', true, true);
        }
        return $this->responseRedirect('artist.design.index', 'Design added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetDesign = $this->designRepository->findDesignById($id);
        
        $this->setPageTitle('Design', 'Edit Design : '.$targetDesign->title);
        return view('artist.design.edit', compact('targetDesign'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'description'     =>  'required|max:1000',
        ]);

        $params = $request->except('_token');

        $design = $this->designRepository->updateDesign($params);

        if (!$design) {
            return $this->responseRedirectBack('Error occurred while updating design.', 'error', true, true);
        }
        return $this->responseRedirectBack('Design updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $design = $this->designRepository->deleteDesign($id);

        if (!$design) {
            return $this->responseRedirectBack('Error occurred while deleting design.', 'error', true, true);
        }
        return $this->responseRedirect('artist.design.index', 'Design has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $banner = $this->designRepository->updateDesignStatus($params);

        if ($banner) {
            return response()->json(array('message'=>'Design status successfully updated'));
        }
    }
    public function bulkStatus(Request $request){
        $params = $request->except('_token');
        $data = $this->designRepository->BulkStatusChange($params);
        return response()->json(['status'=>200]);
    }

    public function mail(){
        $to_name = 'Soham Ghosh';
        $to_email = 'gsoham.51@gmail.com';
        $data = array('name'=>"Soham", "body" => "A test mail");
        Mail::send('artist.design.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Laravel Test Mail');
        $message->from('contact@demo91.co.in','Test Mail');
        });
    }
}
