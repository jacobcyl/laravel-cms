<?php namespace App\Repositories\Contracts;
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午11:13
 */

use App\Repository\Criteria\Criteria;

interface CriteriaInterface {

    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @param Criteria $criteria
     * @return $this
     */
    public function getByCriteria(Criteria $criteria);

    /**
     * @param Criteria $criteria
     * @return $this
     */
    public function pushCriteria(Criteria $criteria);

    /**
     * @return $this
     */
    public function  applyCriteria();
}