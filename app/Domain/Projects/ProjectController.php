<?php

namespace App\Domain\Projects;

use App\Domain\Core\Controllers\Controller;
use App\Domain\Core\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    private $projectService;
    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request){
        $spec = $request->only('timeline','search');

        $data = $this->projectService->getProjects($spec);
        return view('project.index')->with(compact('data'));
    }


    //START - INSERT DATA CONTROLLER
    public function create(){
        $cul = $this->projectService->getCultivations();
        $list = $cul->pluck('description','id')->toArray();

        return view('project.create')->with(compact('list'));
    }

    public function store(Request $request){
        $data = $request->only('cultivation_id','title','start_at','end_at','image_url');
        $response = $this->projectService->store($data);

        return $response;
    }
    //END - INSERT DATA CONTROLLER

    //START - UPDATE DATA CONTROLLER
    public function edit($id){
        $response = $this->projectService->edit($id);
        return $response;
    }

    public function update($id,Request $request){
        $data = $request->only('cultivation_id','title','start_at','end_at','image_url');
        //dd($data);
        $response = $this->projectService->update($id,$data);
        return $response;

    }
    //END - UPDATE DATA CONTROLLER

    public function destroy($id){
        $response = $this->projectService->destroy($id);
        return $response;
    }

}
