<?php

namespace App\Repositories;

abstract class BaseRepository
{
    public abstract function getModel();

    public function findById($id)
    {
        return $this->getModel()->find($id);
    }

    public function findFirst($conditions, $with = [])
    {
        return $this->getModel()->where($conditions)->with($with)->first();
    }

    public function findAll($conditions = [], $with = [], $orderBy = 'id', $sort = 'desc')
    {
        return $this->getModel()->where($conditions)->with($with)->orderBy($orderBy, $sort)->get();
    }

    public function insert($attributes)
    {
        return $this->getModel()->create($attributes);
    }

    public function update($attributes, $id)
    {
        return $this->findById($id)->update($attributes);
    }

    public function deleteById($id): bool
    {
        $result = $this->findById($id);
        if ($result) {
            return $this->getModel()->destroy($id);
        }
        return false;
    }

    public function deleteFirst($conditions): bool
    {
        $result = $this->findFirst($conditions);
        if ($result) {
            return $this->getModel()->destroy($result->id);
        }
        return false;
    }
}
