<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 2017/3/29
 * Time: 下午9:47
 */

namespace App\Repositories\Criteria;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class OrderBy extends Criteria 
{

    protected $orders;
    public function __construct($orders){
        $this->orders = $orders;
    }
    
    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        foreach ($this->orders as $field => $value){
            $model = $model->orderBy($field, $value);
        }
        return $model;
    }
}