<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\Criteria\OrderBy;
use App\Repositories\Criteria\Post\LatestPosts;
use App\Repositories\StaffRepository as Staff;
use App\Repositories\CategoryRepository as Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StaffController extends BaseController
{
    /**
     * @var Staff $post
     */
    protected $staff;

    /**
     * @var Category $category
     */
    protected $category;

    /**
     * @param Staff $post
     */
    public function __construct(Staff $staff){
        $this->staff = $staff;
    }
    
    public function index(){
        $this->staff->pushCriteria(new OrderBy(['order'=>'desc']));
        $staffs = $this->staff->with(['avatar'])->all();
        return view('dashboard.staff.index', compact('staffs'));
    }
    
    /*
     * 创建文章
     */
    public function create(){
        return view('dashboard.staff.create');
    }

    /**
     * 保存文章
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $rules = [
            'avatar_id'  => 'required|exists:media,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['description'] = str_replace(chr(13).chr(10), "<br />", $data['description']);

        $staff = $this->staff->create($data);
        
        return redirect(route('dashboard.staff-list'));
    }

    public function delete($id){
        $post = $this->staff->delete($id);
        return back();
    }

    public function edit($id){
        $staff = $this->staff->with(['avatar'])->find($id);
        if(!$staff)
            abort(404);
        
        return view('dashboard.staff.edit', compact('staff'));
    }

    public function update(Request $request, $id){
        Log::debug($request->all());
        $data = $request->all();
        foreach ($data as $lang => $item){
            isset($data[$lang]['description']) && $data[$lang]['description'] = str_replace(chr(13).chr(10), "<br />", $data[$lang]['description']);
        }
        $this->staff->updateRich($data, $id);

        return redirect(route('dashboard.staff-list'));
    }
    
    public function move($id, $direct){
        Log::debug($id.'->'.$direct);
        if(!in_array($direct, ['up', 'down'])){
            return back()->withMessage('参数错误');
        }

        $staff = $this->staff->find($id);
        Log::debug($staff);
        $order = $staff->order;
        $this->staff->pushCriteria(new OrderBy(['order'=> $direct==='up'?'asc':'desc']));
        $targetStaff = $this->staff->findWhere([['order', $direct==='up'?'>':'<', $order]])->first();
        Log::debug($targetStaff);
        $staff->order = $targetStaff->order;
        $targetStaff->order = $order;
        $staff->save();
        $targetStaff->save();

        return back();
    }
}
