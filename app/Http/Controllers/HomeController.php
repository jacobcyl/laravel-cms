<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function postContact(Request $request){
        $rules = [
            'name'  => 'required',
            'email' => 'required|email',
            'message' => 'required|min:3'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput()->withMessage('Validation Error');
        }

        Message::create($request->all());

        return back()->withMessage('Add successfully');
    }
}
