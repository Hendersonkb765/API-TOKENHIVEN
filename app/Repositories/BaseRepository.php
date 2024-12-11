<?php
namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
class BaseRepository implements BaseRepositoryInterface{

    protected $model;
    protected $userId;
    public function __construct(Model $model,int $userId){
        
        $this->userId = $userId;
        $this->model = $model;
    }
    public function all(array $queryfilter){

        if(empty($queryfilter)){
            return $this->model->all();
        }
        if(!empty($queryfilter['whereIn'])){
            foreach ($queryfilter['whereIn'] as $where){
                $this->model = $this->model->whereIn($where[0],$where[1]);
            }
        }
        
        $resouce = $this->model->where($queryfilter['where'])->get();

        return $resouce;
    }
    public function create(array $data){
        $data['system_manager_id'] = $this->userId;
        $model = $this->model->create($data);

        if(empty($model)){
            return throw new \Exception('An error occurred while trying to create the user');
        }
        return $model;
    }
    public function update(array $data,Model $model){

        if($model->system_manager_id != $this->userId){
            return throw new \Exception('You are not authorized to update this user');
        }
        $model->update($data);
       
    }
    public function delete(Model $model){

        if($model->system_manager_id != $this->userId){
            return throw new \Exception('You are not authorized to delete this user');
        }
        $model->delete();
    }
    public function show(Model $model){
        if($model->system_manager_id != $this->userId){
            return throw new \Exception('You are not authorized to view this user');
        }
        return $model;

    }

}