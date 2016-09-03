<?php
namespace App\Repositories;
use App\Models\Post;

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午10:40
 */
class PostRepository extends BaseRepository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Post::class;
    }


}