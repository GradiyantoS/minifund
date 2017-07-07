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
    public function getProjects();
    public function getProject($id);

    public function store(array $data);
    public function update($id,array $data);
    public function destroy($id);

    public function getCultivations();

    public function getProjectSearch(array $data);
}