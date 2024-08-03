<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository
{

    public function getModel()
    {
        return new Project();
    }
}
