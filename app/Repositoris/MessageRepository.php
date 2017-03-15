<?php
namespace App\Repositories;
use App\Models\Message;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午10:40
 */
class MessageRepository extends Repository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Message::class;
    }
}