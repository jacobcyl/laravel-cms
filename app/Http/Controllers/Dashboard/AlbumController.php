<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Media;
use App\Repositories\AlbumRepository as Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AlbumController extends BaseController
{
    /**
     * @var Post $post
     */
    protected $album;


    /**
     * @param Album $media
     * @internal param Post $post
     */
    public function __construct(Album $album){
        $this->album = $album;
    }

    /**
     * get media list
     */
    public function index(Request $request){
        //$this->album->pushCriteria(new LatestAssets());
        $albums = $this->album->paginate(30);

        return view('dashboard.album.index', compact('albums'));
    }

    public function show($album_id){
        $album = $this->album->with(['photos'])->find($album_id);
        return view('dashboard.album.show', compact('album'));
    }

    /*
     * 创建相册
     */
    public function create(Request $request){
        return view('dashboard.album.create');
    }

    /**
     * 保存相册
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  => 'required'
        ]);
        if($validator->fails()){
            $this->throwValidationException(
                $request, $validator
            );
        }

        $album = $this->album->create($request->all());

        return redirect(route('dashboard.show-album', ['album_id' => $album->id]));
    }

    public function addPhoto(Request $request, $album_id){
        $validator = Validator::make($request->all(), [
            'photo_id'  => 'required|exists:media,id',
        ]);
        if($validator->fails()){
            $this->throwValidationException(
                $request, $validator
            );
        }

        $album = $this->album->find($album_id);

        Log::debug('request:', $request->all());
        $album->photos()->attach($request->get('photo_id'), ['description' => $request->get('description')]);

        return back()->withMessage('添加图片成功');
    }
    
    public function delPhoto($album_id, $id){
        $media = Media::findOrFail($id);
        
        $album = $this->album->find($album_id);

        $album->photos()->detach($id);

        return back();
    }
}
