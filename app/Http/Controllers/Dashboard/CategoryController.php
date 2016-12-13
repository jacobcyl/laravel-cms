<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Repositories\CategoryRepository as Cate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    protected $categoryRepository;

    public function __construct(Cate $category){
        $this->category = $category;
    }

    /*
     * 创建分类
     */
    public function index(){
        $categories = $this->category->withDepth()->where('cate_type', 'post')->get()->toFlatTree();
        return view('dashboard.category.index', compact('categories'));
    }
    

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent' => 'required|numeric',
            'cate_type' => 'required'
        ]);

        $validator->sometimes('parent', 'numeric|exists:categories,id', function($input){
            return $input->parent > 0;
        });

        if($validator->fails()){
            return response()->json(['error'=>true, 'message'=>'表单验证错误']);
        }

        $parent = $request->get('parent');
        $node = $this->category->createNode($parent, $request->all());

        return $request->ajax()?response()->json($node):back();
    }

    public function delete(Request $request, $id){
        $node = $this->category->find($id);
        if(!$node){
            throw new ModelNotFoundException;
        }

        $node->delete();

        return $request->ajax()?response()->json(['message'=>'已删除']):back();
    }
    
}
