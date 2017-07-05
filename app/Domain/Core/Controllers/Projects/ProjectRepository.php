<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Core\Controllers\Projects;



use App\Domain\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getProjects()
    {
        // TODO: Implement getProjects() method.
        $data = $this->project->all();
        return $data;
    }

}