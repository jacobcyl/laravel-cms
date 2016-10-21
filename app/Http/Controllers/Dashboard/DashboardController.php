<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/7/10
 * Time: 下午5:39
 */

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function showDashboard(){
        return view('dashboard.home.index');
    }
}