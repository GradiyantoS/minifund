<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:44
 */

namespace App\Domain\Cultivations;


interface CultivationServiceInterface
{

    public function getCultivations($input);
    public function getCultivation($id);

    public function store(array $data);
    public function update($id,array $data);
    public function destroy($id);
}