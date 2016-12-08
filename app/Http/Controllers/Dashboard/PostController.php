<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\PostRepository as Post;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * @var Post $post
     */
    protected $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post){
        $this->post = $post;
    }
    
    public function index(){
        
        return view('dashboard.post.index');
    }
    
    /*
     * 创建文章
     */
    public function create(){
        return view('dashboard.post.create');
    }

    /**
     * 保存文章
     * @param Request $request
     */
    public function store(Request $request){
        $this->post->create($request->all());
        
        return redirect(route('dashboard.post-list'));
    }
}
