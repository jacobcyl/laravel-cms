<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends BaseController
{
    public function index(){
        return view('dashboard.post.index');
    }
    
    /*
     * 创建文章
     */
    public function create(){
        return view('dashboard.post.create');
    }
}
