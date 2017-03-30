<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/7/10
 * Time: 下午5:39
 */

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Repositories\AlbumRepository;
use App\Repositories\MessageRepository;
use App\Repositories\PostRepository;
use App\Repositories\StaffRepository;
use Illuminate\Support\Facades\Log;
//use Tracker;

class DashboardController extends Controller
{
    protected $message;
    protected $staff;
    protected $post;
    protected $album;
    
    public function __construct(MessageRepository $message, StaffRepository $staff, PostRepository $post, AlbumRepository $album){
        $this->message = $message;
        $this->staff = $staff;
        $this->post = $post;
        $this->album = $album;
    }

    public function showDashboard(){
        $msgCount = $this->message->findWhere(['status' => 'unread'])->count();
        $postCount = $this->post->all()->count();
        $staffCount = $this->staff->findWhere(['status' => 'publish'])->count();
        $albumCount = $this->album->all()->count();
        //$users = Tracker::onlineUsers();
        //Log::debug($users->count().' users');
        return view('dashboard.home.index', compact('msgCount', 'postCount', 'staffCount', 'albumCount'));
    }
}