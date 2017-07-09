<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Cultivations;



use Illuminate\Database\Eloquent\ModelNotFoundException;
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


    public function edit($id)
    {
        // TODO: Implement edit() method.
        try{
            $data = $this->cultivation->getCultivation($id);

        }catch (ModelNotFoundException $e){
            return redirect('cultivation')->with('message','Object Not Found');
        }
        return view('cultivation.edit')->with(compact('data'));
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

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            mail("gsmailtester@gmail.com","New Cultivation Notification","New Cultivation : ".$data['description']);
            $this->cultivation->store($data);
            return redirect('cultivation')->with('message','Tambah data berhasil');
        }
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
            try{
                $this->cultivation->update($id,$data);
            }catch (ModelNotFoundException $e){
                return redirect('cultivation')->with('message','Object not found');
            }
            return redirect('cultivation')->with('message','Ubah data berhasil');
        }
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.

        try{
            $this->cultivation->destroy($id);
        }catch (ModelNotFoundException $e){
            return redirect('cultivation')->with('message','Object not found');
        }
        return redirect('cultivation')->with('message','Hapus data berhasil');

    }

}