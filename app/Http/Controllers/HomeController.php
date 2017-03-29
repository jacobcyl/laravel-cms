<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Message;
use App\Repositories\AlbumRepository;
use App\Repositories\Criteria\OrderBy;
use App\Repositories\OptionRepository;
use App\Repositories\StaffRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    protected $option;
    protected $album;
    protected $staff;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OptionRepository $option, AlbumRepository $album, StaffRepository $staff)
    {
        //$this->middleware('auth');
        $this->option = $option;
        $this->album = $album;
        $this->staff = $staff;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = $this->option->findWhere(['option_cate'=>'home']);
        $albumOption = $options->where('option-name', 'home-gallery')->first();
        if($albumOption){
            $album = $this->album->find($albumOption['option_value']);
            !album && $album = $this->album->first();
        } else {
            $album = $this->album->first();
        }

        $this->staff->pushCriteria(new OrderBy(['order'=>'desc']));
        $staffs = $this->staff->with(['avatar'])->all();

        return view('home', compact('options', 'album', 'staffs'));
    }

    public function postContact(Request $request){
        $rules = [
            'name'  => 'required',
            'email' => 'required|email',
            'message' => 'required|min:3',
            'captcha' => 'required|captcha'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()], 422);
        }

        Message::create($request->all());

        return response()->json(['error'=>false, 'message'=>'submit successfully']);
    }
}
