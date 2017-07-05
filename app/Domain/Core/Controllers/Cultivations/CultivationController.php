<?php

namespace App\Domain\Core\Controllers\Cultivations;

use App\Domain\Core\Controllers\Controller;
use Illuminate\Http\Request;

class CultivationController extends Controller
{
    public function index(){
        return view('cultivation.index');
    }

}
