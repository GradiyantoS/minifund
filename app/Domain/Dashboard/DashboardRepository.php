<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 09/07/2017
 * Time: 13:13
 */

namespace App\Domain\Dashboard;


use App\Domain\Core\Models\Project;

class DashboardRepository implements DashboardRepositoryInterface
{
    private $dashboard;
    public function __construct(Project $project)
    {
        $this->dashboard = $project;
    }

    public function getDashboards()
    {
        // TODO: Implement getDashboards() method.
        return $this->dashboard->all();
    }

    public function getDashboard($id)
    {
        // TODO: Implement getDashboard() method.
        return $this->dashboard->findOrFail($id);
    }

}