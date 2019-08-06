<?php

namespace App\Http\Controllers;

use App\Event;
use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EventController extends Controller
{
    public function invitationForm(Request $request)
    {
        return View::make('eventInvitationForm');
    }

    public function getInvitationDetails()
    {
        $event = Event::find(request()->event_id);
        $guest = $this->getGuest(request()->all());

        if (empty($event) || empty($guest)) {
            return response()->json([
                'status' => false
            ]);
        } else {
            return response()->json([
                'status'         => true,
                'event'          => $event,
                'start'          => renderDate($event->start_dt, 'l, F d, Y h:i A'),
                'end'            => renderDate($event->end_dt, 'l, F d, Y h:i A'),
                'guest_response' => $guest->status,
            ]);
        }
    }

    public function respondToEvent()
    {
        $update = $this->getGuest(request()->all())
                       ->update(['status' => request()->event_response]);


        return response()->json([
            'status' => $update,
        ]);
    }

    public function getGuest($data) {
        return Guest::whereEventId($data['event_id'])
                        ->whereEmail($data['guest_email'])
                        ->get()
                        ->first();
    }
}
