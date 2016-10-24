<?php namespace App\Repositories\Contracts;
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/3
 * Time: 上午11:07
 */
interface RepositoryInterface {

    public function all($columns = array('*'));

    public function paginate($perPage = 15, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));
}