<?php namespace App\Repository\Criteria;
use App\Repositories\Contracts\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface as Repository;

/**
 * Created by jacobcyl.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午11:04
 */
abstract class Criteria{

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}