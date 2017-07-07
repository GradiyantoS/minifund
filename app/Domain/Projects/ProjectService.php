<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Projects;



use App\Domain\Cultivations\CultivationRepositoryInterface;
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

    public function getProjects()
    {
        $data = $this->project->getProjects();
        return $data;
    }

    public function getProject($id)
    {
        // TODO: Implement getProject() method.
        return $this->project->getProject($id);
    }

    public function getProjectSearch(array $data)
    {
        // TODO: Implement getProjectSearch() method.
        switch ($data['timeline']){
            case 1: return $this->project->getAllProject($data['search']);break;
            case 2: return $this->project->getActiveProject($data['search']);break;
            case 3: return $this->project->getEndedProject($data['search']);break;
        }
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
            return $this->project->update($id,$data);
        }
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        return $this->project->destroy($id);
    }

    public function getCultivations()
    {
        // TODO: Implement getCultivations() method.
        return $this->cultivationRepository->getCultivations();
    }

}