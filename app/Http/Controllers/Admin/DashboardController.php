<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Admin\BaseController as Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return View::make('admin::index');
    }
}
