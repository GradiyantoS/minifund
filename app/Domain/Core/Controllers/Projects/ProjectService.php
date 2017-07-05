<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Core\Controllers\Projects;


class ProjectService implements ProjectServiceInterface
{

    private $project;

    public function __construct(ProjectRepositoryInterface $projectRepository){
        $this->project = $projectRepository;
    }

    public function getProjects()
    {
        $data = $this->project->getProjects();
        return $data;
    }
}