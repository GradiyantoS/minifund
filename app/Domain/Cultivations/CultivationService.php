<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Cultivations;



use Illuminate\Support\Facades\Validator;

class CultivationService implements CultivationServiceInterface
{
    private $cultivation;

    public function __construct(CultivationRepositoryInterface $cultivationRepository)
    {
        $this->cultivation = $cultivationRepository;
    }

    public function getCultivations($input)
    {
        // TODO: Implement getCultivations() method.
        return $this->cultivation->getCultivations($input);
    }
    public function getCultivation($id){
        return $this->cultivation->getCultivation($id);
    }


    private function storeValidator(array $data)
    {
        $validator = Validator::make($data, [
            // TODO: Add store validator here
            'description' => 'required | min:1'
        ]);

        return $validator;
    }

    private function updateValidator(array $data)
    {
        $validator = Validator::make($data, [
            // TODO: Add store validator here
            'description' => 'required | min:1'
        ]);

        return $validator;
    }

    public function store(array $data){

        $validator = $this->storeValidator($data);

        if($validator->fails()) {

            return redirect('cultivation/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{

            return $this->cultivation->store($data);
        }
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.

        $validator = $this->updateValidator($data);
        if($validator->fails()) {

            return redirect('cultivation/edit')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            return $this->cultivation->update($id,$data);
        }
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.

        return $this->cultivation->destroy($id);

    }

}