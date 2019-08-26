<?php

namespace App\Http\Controllers\Account;

use Auth;

use App\Http\Controllers\Account\BaseController as Controller;

use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return View::make('account::profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return View::make('account::profileEdit', compact('user'));
    }

    public function update()
    {
        $data = request();

        Auth::user()->update([
            'email' => $data->name,
        ]);

        return redirect('/account/profile')->with('success', 'Edited Successfully');
    }
}
