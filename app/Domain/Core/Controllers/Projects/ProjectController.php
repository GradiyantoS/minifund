<?php

namespace App\Domain\Core\Controllers\Projects;

use App\Domain\Core\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    private $projectService;
    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(){
        $data = $this->projectService->getProjects();
        return view('project.index')->with(compact('data'));
    }
}
