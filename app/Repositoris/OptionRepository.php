<?php
namespace App\Repositories;
use App\Models\Option;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午10:40
 */
class OptionRepository extends Repository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Option::class;
    }

    public function updateOrCreate(array $searchData, array $saveData = []) {
        return $this->model->updateOrCreate($searchData, $saveData);
    }
}