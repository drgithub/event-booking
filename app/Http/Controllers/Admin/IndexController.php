<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function create()
    {

    }

    public function profile()
    {
        return View::make('admin::profile');
    }

    public function edit()
    {
        return View::make('admin::profileEdit');
    }
}
