<?php
/**
 * Created by PhpStorm.
 * User: WaroenglordZ
 * Date: 07/07/2017
 * Time: 15:19
 */

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;

class LoginPanel
{
    public function handle($request, Closure $next, $guard = null )
    {
        if (Auth::guard($guard)->check() == null) {
            return redirect('/login');
        }
        else{
            // user CANNOT CUD CULTIVATION
            if(Auth::user()->role_id == 2) {
                if($request->route()->getActionName() == "App\\Domain\\Cultivations\\CultivationController@create"){
                    return redirect('/cultivation');
                }
                else if($request->route()->getActionName() == "App\\Domain\\Cultivations\\CultivationController@edit"){
                    return redirect('/cultivation');
                }
                else if($request->route()->getActionName() == "App\\Domain\\Cultivations\\CultivationController@store"){
                    return redirect('/cultivation');
                }
                else if($request->route()->getActionName() == "App\\Domain\\Cultivations\\CultivationController@update"){
                    return redirect('/cultivation');
                }
                else if($request->route()->getActionName() == "App\\Domain\\Cultivations\\CultivationController@destroy"){
                    return redirect('/cultivation');
                }
            }
        }


        return $next($request);
    }
}