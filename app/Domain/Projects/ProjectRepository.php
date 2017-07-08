<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Projects;




use App\Domain\Core\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getProjects(array $data)
    {
        // TODO: Implement getProjects() method.
        $query = $this->project
        ->where(function ($query) use ($data) {
            $query->where('title', 'like', $data['search'].'%')
                ->orWhere('project_no', 'like', $data['search'].'%');
        });
        switch($data['timeline']){
            case 2: $query
                ->where('start_at','>',\Carbon\Carbon::now() );break;
            case 3: $query
                ->where('start_at','<=',\Carbon\Carbon::now() )
                ->where('end_at','>=',\Carbon\Carbon::now() );break;
            case 4:$query
                ->where('end_at','<',\Carbon\Carbon::now() );break;
        }
        return $query->paginate(config('constants.PAGE_NUMBER'));
    }
    public function getAllProject($name){
        return $this->project
            ->where('title','like',$name.'%')
            ->paginate(config('constants.PAGE_NUMBER'));
    }
    public function getActiveProject($name){
        return $this->project
            ->where('title','like',$name.'%')
            ->where('end_at','>',\Carbon\Carbon::now() )
            ->paginate(config('constants.PAGE_NUMBER'));
    }
    public function getEndedProject($name){
        return $this->project
            ->where('title','like',$name.'%')
            ->where('end_at','<=',\Carbon\Carbon::now())
            ->paginate(config('constants.PAGE_NUMBER'));
    }

    public function getProject($id)
    {
        // TODO: Implement getProject() method.
        $data = $this->project->find($id);
        return $data;
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $newProject = new Project();
        $newProject->id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $newProject->cultivation_id  = $data['cultivation_id'];
        $newProject->title = $data['title'];
        $newProject->start_at = $data['start_at'];
        $newProject->end_at = $data['end_at'];
        $newProject->image_url = $data['image_url'];
        //dd($newProject);
        $newProject->save();
        // redirect
        Session()->flash('message', 'Penambahan Project Berhasil !!');
        return redirect('project');
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
        $update = $this->getProject($id);

        $update->cultivation_id  = $data['cultivation_id'];
        $update->title = $data['title'];
        $update->start_at = $data['start_at'];
        $update->end_at = $data['end_at'];
        $update->image_url = $data['image_url'];
        $update->save();
        Session()->flash('message', 'Ubah Project Berhasil !!');
        return redirect('project');
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $del = $this->getProject($id);

        $del->delete();
        // redirect
        Session()->flash('message', 'Hapus Project Berhasil !!');
        return redirect('project');
    }

}