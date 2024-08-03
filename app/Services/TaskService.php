<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService extends BaseService
{
    public function __construct(TaskRepository $taskRepository)
    {
        $this->repo = $taskRepository;
    }

    public function getTasks($project_id)
    {
        return $this->repo->getByProjectId($project_id);
    }

    public function saveTask($postData)
    {
        $id = data_get($postData, 'id');
        if ($id) {
            return $this->repo->update($postData, $id);
        }
        return $this->repo->insert($postData);
    }

    public function deleteTask($id): bool
    {
        return $this->repo->deleteById($id);
    }
}
