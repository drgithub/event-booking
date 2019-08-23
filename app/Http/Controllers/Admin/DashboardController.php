<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Admin\BaseController as Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return View::make('admin::index', compact('event'));
    }
}
