<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EventController extends Controller
{
    public function invitationForm(Request $request)
    {
        return View::make('eventInvitationForm');
    }
}
