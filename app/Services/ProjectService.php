<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService extends BaseService
{
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->repo = $projectRepository;
    }

    public function getProjects()
    {
        return $this->repo->findAll();
    }
}
