<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\AlbumRepository;
use App\Repositories\MessageRepository;
use App\Repositories\OptionRepository as Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MessageController extends BaseController
{
    /**
     * @var Option $post
     */
    protected $message;



    /**
     * @param Option $media
     * @internal param Post $post
     */
    public function __construct(MessageRepository $message){
        $this->message = $message;
    }

    /**
     * get media list
     */
    public function index(Request $request){
        //$this->album->pushCriteria(new LatestAssets());
        $messages = $this->message->paginate(30);
        return view('dashboard.message.index', compact('messages'));
    }

    public function read($id){
        $message = $this->message->find($id);

        $message->update(['status' => 'read']);

        return back();
    }

    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){

    }

    public function del($id){
        $message = $this->message->find($id);

        $message->delete();

        return back();
    }
}
