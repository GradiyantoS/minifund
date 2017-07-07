<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:42
 */

namespace App\Domain\Cultivations;


use App\Domain\Core\Models\Cultivation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CultivationRepository implements CultivationRepositoryInterface
{
    private $cultivation;

    public function __construct(Cultivation $cultivation)
    {
        $this->cultivation=$cultivation;
    }
    public function getCultivations()
    {
        // TODO: Implement getCultivations() method.
        return $this->cultivation->paginate(config('constants.PAGE_NUMBER'));
    }

    public function getCultivation($id){
        return $this->cultivation->find($id);
    }
    public function getCultivationByName($name){
        return $this->cultivation->where('description','like',$name.'%')
            ->paginate(config('constants.PAGE_NUMBER'));;
    }

    public function store(array $data){
        $newCultivation = new Cultivation();
        $newCultivation->description = $data['description'];
        $newCultivation->save();

        // redirect
        Session()->flash('message', 'Penambahan budidaya Berhasil !!');
        return redirect('cultivation');
    }

    public function update($id,array $data){
        $updateCultivation = $this->getCultivation($id);
        $updateCultivation->description = $data['description'];
        $updateCultivation->save();

        // redirect
        Session()->flash('message', 'Pengubahan budidaya Berhasil !!');
        return redirect('cultivation');

    }
    public function destroy($id){
        $deleteCultivation = $this->getCultivation($id);
        $deleteCultivation->delete();
        // redirect
        Session()->flash('message', 'Penghapusan budidaya Berhasil !!');
        return redirect('cultivation');

    }


}