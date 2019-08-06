<?php

namespace App\Http\Controllers;

use App\Event;
use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{
    public function invitationForm(Request $request)
    {
        $fkey = base64_decode(Input::get('fkey'));
        $event_id = $fkey[0];
        $email = substr_replace($fkey, '', 0, 1);
        $guest = Guest::whereEventId($event_id)
                        ->whereEmail($email)
                        ->get()
                        ->first();

        return View::make('eventInvitationForm', compact('guest'));
    }

    public function respondToEvent()
    {
       $guest = Guest::whereEventId(request()->event_id)
                      ->whereEmail(request()->guest_email)
                      ->get()
                      ->first();

        $update = $guest->update(['status' => request()->event_response]);

        return response()->json([
            'status' => $update,
        ]);
    }
}
