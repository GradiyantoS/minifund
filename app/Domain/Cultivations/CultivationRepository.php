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

    public function getCultivations($input)
    {
        // TODO: Implement getCultivations() method.
        return $this->cultivation
            ->where('description','like',$input.'%')
            ->paginate(config('constants.PAGE_NUMBER'));
    }

    public function getCultivation($id){
        return $this->cultivation->findorFail($id);
    }


    public function store(array $data){
        $newCultivation = new Cultivation();
        $newCultivation->description = $data['description'];
        $newCultivation->save();

        // redirect
        return $newCultivation;
    }

    public function update($id,array $data){
        $updateCultivation = $this->getCultivation($id);
        $updateCultivation->description = $data['description'];
        $updateCultivation->save();

        // redirect
        return $updateCultivation;

    }
    public function destroy($id){
        $deleteCultivation = $this->getCultivation($id);
        $deleteCultivation->delete();
        // redirect
        return $deleteCultivation;

    }


}