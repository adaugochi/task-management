<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends BaseRepository
{
    public function getModel(): Task
    {
        return new Task();
    }

    public function getByProjectId($projectId)
    {
        return $this->getModel()->when($projectId, function ($query, $project_id) {
            return $query->where('project_id', $project_id);
        })->orderBy('priority', 'asc')->get();
    }
}
