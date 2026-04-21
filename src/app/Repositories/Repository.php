<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository

{
    protected const FIELD_ID = 'id';
    protected Model $model;
    abstract public function getModelClass():string;
    public function getNewModel()
    {
        $modelClass = $this->getModelClass();
        return new $modelClass;
    }
    public function getModel()
    {
        if (empty($this->model)){
            $this->model = $this->getNewModel();
        }
        return $this->model;
    }
    public function getBuilder()
    {
        return $this->getModel()->newQuery();
    }
       public function save(Model $model)
    {
        return $model->save();
    }

    public function getById(string $id)
    {
        return $this->getBuilder()->where(static::FIELD_ID, '=', $id)->first();
    }

    public function getAll()
    {
        return $this->getBuilder()->get();
    }
}
