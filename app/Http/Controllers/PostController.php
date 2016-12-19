<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository as Post;
use App\Repositories\CategoryRepository as Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var Post $post
     */
    protected $post;

    /**
     * @var Category $category
     */
    protected $category;

    /**
     * @param Post $post
     */
    public function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }
    
    public function index(){
        $posts = $this->post->with(['cover'])->paginate(30);
        return view('news-list', compact('posts'));
    }
    
    public function show($id){
        $post = $this->post->with(['cover'])->find($id);
        if(!$post)
            throw new ModelNotFoundException;
        
        return view('news-show', compact('post'));
    }
}
