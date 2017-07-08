<?php

namespace App\Domain\Cultivations;

use App\Domain\Core\Controllers\Controller;
use Illuminate\Http\Request;

class CultivationController extends Controller
{
    private $cultivation;
    public function __construct(CultivationServiceInterface $cultivationService)
    {
        $this->cultivation=$cultivationService;
    }

    public function index(Request $request){
        $input = $request->only('search');
        $data=$this->cultivation->getCultivations($input['search']);
        return view('cultivation.index')->with(compact('data'));
    }

    public function create(){
        return view('cultivation.create');
    }

    public function edit($id){
        $data = $this->cultivation->getCultivation($id);

        return view('cultivation.edit')->with(compact('data'));
    }

    public function update($id,Request $request){
        $data = $request->only('description');

        $response = $this->cultivation->update($id,$data);
        return $response;
    }



    public function store(Request $request){
        $data = $request->only('description');
        $response = $this->cultivation->store($data);
        return $response;
    }

    public function destroy($id){
        return $this->cultivation->destroy($id);
    }



}
