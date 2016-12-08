<?php
namespace App\Repositories;
use App\Models\Category;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午10:40
 */
class CategoryRepository extends Repository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Category::class;
    }


}