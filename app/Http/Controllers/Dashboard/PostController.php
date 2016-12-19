<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\PostRepository as Post;
use App\Repositories\CategoryRepository as Category;
use Illuminate\Http\Request;

class PostController extends BaseController
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
        return view('dashboard.post.index', compact('posts'));
    }
    
    /*
     * 创建文章
     */
    public function create(){
        $categories = $this->category->withDepth()->where('cate_type', 'post')->get()->toFlatTree();

        return view('dashboard.post.create', compact('categories'));
    }

    /**
     * 保存文章
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $post = $this->post->create(array_merge($request->all(), ['published' => 1]));
        
        if($request->has('category')){
            $categories = $request->get('category');
            
        }
        
        return redirect(route('dashboard.post-list'));
    }

    public function delete($id){
        $post = $this->post->delete($id);

        return back();
    }

    public function edit($id){
        $post = $this->post->find($id);
        $categories = $this->category->withDepth()->where('cate_type', 'post')->get()->toFlatTree();

        return view('dashboard.post.edit', compact('post', 'categories'));
    }
}
