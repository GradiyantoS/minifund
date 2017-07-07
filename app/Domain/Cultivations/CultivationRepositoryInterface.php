<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:43
 */

namespace App\Domain\Cultivations;


interface CultivationRepositoryInterface
{

    public function getCultivations();
    public function getCultivation($id);
    public function getCultivationByName($name);

    public function store(array $data);
    public function update($id,array $data);
    public function destroy($id);

}