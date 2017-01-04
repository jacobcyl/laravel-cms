<?php
namespace App\Repositories;
use App\Models\Media;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午10:40
 */
class MediaRepository extends Repository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Media::class;
    }

}