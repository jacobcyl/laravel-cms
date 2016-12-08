<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends BaseController
{
    protected $categoryRepository;

    public function construct(CategoryRepository $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        //$categories = $this->categoryRepository->allTree();
        
        return view('dashboard.category.index');
    }
    
    /*
     * 创建分类
     */
    public function create(){
        return view('dashboard.category.create');
    }
}
