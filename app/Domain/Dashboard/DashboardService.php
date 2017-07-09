<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 07/07/2017
 * Time: 12:05
 */

namespace App\Domain\Dashboard;


use App\Domain\Projects\ProjectRepositoryInterface;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DashboardService implements DashboardServiceInterface
{
    private $dashboardService;

    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardService = $dashboardRepository;
    }

    public function getDashboards()
    {
        // TODO: Implement getDashboards() method.

        $datas = $this->dashboardService->getDashboards();
        $collection =[];
        foreach ($datas as $data){
            $start = new DateTime($data->start_at);
            $current = new DateTime(Carbon::now()->toDateString());
            $end = new DateTime($data->end_at);
            $range = $end->diff($start)->days; // project interval

            $interval = ($end <= $current) ? $range :$current->diff($start)->days; // day progress
            $finished = ($end <= $current);
            // progress percentage
            $progress = ($interval / $range) *100;
            $collection[] = [
                'id' => $data->id,
                'project_no' => $data->project_no,
                'cultivation_id' => $data->cultivation_id,
                'title' => $data->title,
                'start_at' => $data->start_at,
                'end_at' => $data->end_at,
                'image_url' => $data->image_url,
                'range' => $range,
                'interval' => $interval,
                'progress' => $progress,
                'finished' => $finished
            ];
        }
        return $collection;
    }

    public function getDashboard($id){

        try{
            $response = $this->dashboardService->getDashboard($id);

        }catch (ModelNotFoundException $e){

            //dd($e->getMessage());
            return redirect('dashboard');
        }
        $data = $response;
        return view('dashboard.show')->with(compact('data'));
    }

}