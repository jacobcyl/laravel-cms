<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends BaseController
{
    public function index(){
        return view('dashboard.page.index');
    }
    
    /*
     * 创建文章
     */
    public function create(){
        return view('dashboard.page.create');
    }
}
