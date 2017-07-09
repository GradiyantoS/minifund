<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 09/07/2017
 * Time: 13:12
 */

namespace App\Domain\Dashboard;


interface DashboardRepositoryInterface
{
    public function getDashboards();
    public function getDashboard($id);
}