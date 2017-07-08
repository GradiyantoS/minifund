<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:43
 */

namespace App\Domain\Projects;



interface ProjectRepositoryInterface
{
    public function getProjects(array $data);
    public function getProject($id);

    public function store(array $data);
    public function update($id,array $data);
    public function destroy($id);



}