<?php namespace App\Repositories\Criteria\Post;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class LatestAssets extends Criteria {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $model = $model->where('category', 'assets')->latest();
        return $model;
    }
}