<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Projects;



use App\Domain\Cultivations\CultivationRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class ProjectService implements ProjectServiceInterface
{
    private $project;
    private $cultivationRepository;
    public function __construct(
        ProjectRepositoryInterface $projectRepository,
        CultivationRepositoryInterface $cultivationRepository
    ){
        $this->project = $projectRepository;
        $this->cultivationRepository = $cultivationRepository;
    }

    public function getProjects(array $data)
    {
        $data = $this->project->getProjects($data);
        return $data;
    }

    public function getProject($id)
    {
        // TODO: Implement getProject() method.
        try {
            $response = $this->project->getProject($id);
        }catch (ModelNotFoundException $e){
            return redirect('project')->with('message','object not found');
        }
    }

    public function edit($id){
        try {
            $response = $this->project->getProject($id);
        }catch (ModelNotFoundException $e){
            return redirect('project')->with('message','object not found');
        }
        $data = $response;

        $cul = $this->getCultivations();
        $list = $cul->pluck('description','id')->toArray();
        $image = asset('storage/'.$data->image_url);
        return view('project.edit')->with(compact('data','list','image'));
    }

    private function storeValidator(array $data)
    {
        $validator = Validator::make($data, [
            // TODO: Add store validator here
            'cultivation_id' => 'required ',
            'title' =>'required',
            'start_at' =>'required | date',
            'end_at' =>'required | date | after:start_at',
            'image_url' =>'required | mimes:jpeg,jpg,png',
        ]);

        return $validator;
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $validator = $this->storeValidator($data);

        if($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $image = $data['image_url']->storeAs('/upload', $data['image_url']->getClientOriginalName());
            $data['image_url']=$image;
            //dd($data);
            //dd(asset('storage/'.$image));
            return $this->project->store($data);
        }
    }

    private function updateValidator(array $data)
    {
        $validator = Validator::make($data, [
            // TODO: Add store validator here
            'cultivation_id' => 'required ',
            'title' =>'required',
            'start_at' =>'required | date',
            'end_at' =>'required | date | after:start_at',
            'image_url' =>'nullable | mimes:jpeg,jpg,png',
        ]);

        return $validator;
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.

        $validator = $this->updateValidator($data);

        if($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            if($data['image_url']){
                $image = $data['image_url']->storeAs('/upload', $data['image_url']->getClientOriginalName());

            }
            else{
                $image = $this->project->getProject($id)->image_url;
            }
            $data['image_url']=$image;
            //dd($data);
            //dd(asset('storage/'.$image));
            try{
                $this->project->update($id,$data);
            } catch (ModelNotFoundException $e){
                return redirect('project') ->with('message', 'Data tidak ditemukan');
            }
            return redirect('project')->with('message','data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        try{
            $this->project->destroy($id);
        } catch (ModelNotFoundException $e){
            return redirect('project') ->with('message', 'Data tidak ditemukan');
        }
        return redirect('project')->with('message','data berhasil dihapus');
    }

    public function getCultivations()
    {
        // TODO: Implement getCultivations() method.
        $input ='';
        return $this->cultivationRepository->getCultivations($input);
    }

}