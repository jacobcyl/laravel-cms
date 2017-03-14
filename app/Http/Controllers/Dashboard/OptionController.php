<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\AlbumRepository;
use App\Repositories\OptionRepository as Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OptionController extends BaseController
{
    /**
     * @var Option $post
     */
    protected $option;

    protected $album;


    /**
     * @param Option $media
     * @internal param Post $post
     */
    public function __construct(Option $option, AlbumRepository $album){
        $this->option = $option;
        $this->album = $album;
    }

    /**
     * get media list
     */
    public function page(){
        //$this->album->pushCriteria(new LatestAssets());
        $options = $this->option->all();
        $albums = $this->album->all();

        $albumOption = $options->where('option-name', 'home-gallery')->first();

        return view('dashboard.option.page', compact('options', 'albums', 'albumOption'));
    }


    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'option_name'  => 'required',
            'option_value' => 'required',
            'option_cate'  => 'required'
        ]);
        if($validator->fails()){
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->option->updateOrCreate(['option_name'=>$request->get('option_name')], $request->all());

        if($request->ajax()){
            return response()->json(['error'=>false, 'message' => '设置成功']);
        }

        return back();
    }

}
