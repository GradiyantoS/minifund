<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 05/07/2017
 * Time: 16:44
 */

namespace App\Domain\Dashboard;



interface DashboardServiceInterface
{
    public function getDashboards();
    public function getDashboard($id);

}