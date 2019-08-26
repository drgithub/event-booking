<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Account\BaseController as Controller;

use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function profile()
    {
        return View::make('account::profile');
    }

    public function edit()
    {
        return View::make('account::profileEdit');
    }
}
