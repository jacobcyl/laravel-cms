<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\Criteria\Post\LatestAssets;
use App\Repositories\MediaRepository as Media;
use Illuminate\Http\Request;
use App\Facades\FileUpload;
use Log;

class MediaController extends BaseController
{
    /**
     * @var Post $post
     */
    protected $media;


    /**
     * @param Media $media
     * @internal param Post $post
     */
    public function __construct(Media $media){
        $this->media = $media;
    }

    /**
     * get media list
     */
    public function getList(Request $request){
        $this->media->pushCriteria(new LatestAssets());
        $medias = $this->media->paginate(12);

        if($request->ajax()){
            return response()->json($medias);
        }
    }

    /**
     * upload media
     * @param string $type
     * @param string $cate
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request, $type = 'image', $cate = 'assets'){
        Log::debug($request->all());
        $file = FileUpload::handle($request->file('file'), 'uploads/posts');

        if($request->get('from', '') == 'editor'){
            if($file){
                return $file->url;
            }else{
                return "error|上传图片失败";
            }
        }
        if($request->ajax() && $file){
            return response()->json($file);
        }
        return 'failed';
    }
    
}
