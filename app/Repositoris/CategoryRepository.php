<?php
namespace App\Repositories;
use App\Models\Category;
use Bosnadev\Repositories\Eloquent\Repository;
use Log;

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

    /**
     * 计算树的层级
     * @return mixed
     */
    public function withDepth(){
        return $this->model->withDepth();
    }

    /**
     * @param int $parent 父类ID
     * @param array $input attributes
     * @return Category $node
     */
    public function createNode($parent, array $input){
        Log::debug($input);
        $node = $this->create($input);

        // if($parent > 0){
        //     $parentNode = $this->find($parent);
        //     $parentNode->appendNode($node);
        // }
        
        return $node;
    }
}