<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:44
 */

namespace App\Domain\Projects;



interface ProjectServiceInterface
{
    public function getProjects(array $data);
    public function getProject($id);

    public function store(array $data);
    public function edit($id);
    public function update($id,array $data);
    public function destroy($id);

    public function getCultivations();

}