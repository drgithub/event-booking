<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Guest;
use Illuminate\Http\Request;
use App\Mail\EventInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Admin\BaseController as Controller;

class EventController extends Controller
{
    public function index()
    {
        return View::make('admin::events.index');
    }

    public function show($id)
    {
        $guest = Guest::find($id);

        return view('admin.events.show', compact('guest'));
    }
    
    public function create()
    {
        return View::make('admin::events.create');
    }

    public function store(Request $request)
    {
        $message = "";
        $status = 0;

        $guestList = explode(',', $request->guests_email);
        $event = Event::create($request->except('guests_email'));

        $newGuestList = array();

        foreach ($guestList as $guest) {
            if (filter_var($guest, FILTER_VALIDATE_EMAIL)) {
                array_push($newGuestList, new \App\Guest(['email' => $guest]));
            }
        }

        if ($event->guests()->saveMany($newGuestList)) {
            foreach ($event->guests as $guest) {
                Mail::to($guest)->send(new EventInvitation($event, $guest->id));
            }
            
            $status = 1;
            $message = "The event has been successfully added.";
        } else {
            $message = "Sorry, something went wrong. We are working on it and we'll get it fixed as soon as we can.";
        }

        return response()->json([
            "status" => $status,
            "message" => $message
        ]);
    }

    public function edit(Event $event)
    {
        $guestEmails = "";

        foreach ($event->guests as $guest) {
            $guestEmails .= ',' . $guest->email;
        }

        return View::make('admin::events.edit', compact('event', 'guestEmails'));
    }

    public function update(Request $request, Event $event)
    {
        $currentGuests = [];
        $removedEmails = [];

        $update = $event->update($request->except('guests_email'));
        $guestEmails = explode(",", $request->guests_email);

        foreach ($event->guests as $guest) {
            array_push($currentGuests, $guest->email);
        }

        $removedEmails = array_diff($currentGuests, $guestEmails);

        if ($update) {
            foreach ($guestEmails as $guestEmail) {
                if (filter_var($guestEmail, FILTER_VALIDATE_EMAIL)) {
                    $guest = $event->guests()->whereEmail($guestEmail)->get();

                    if ($guest->isEmpty()) {
                        $newGuest = $event->guests()->create(['email' => $guestEmail]);
                        Mail::to($newGuest)->send(new EventInvitation($event, $newGuest->id));
                    }
                }
            }

            foreach ($removedEmails as $email) {
                $guest = $event->guests()->whereEmail($email)->get()->first();
                $guest->delete();
            }

            $message = "Event successfully Updated!";
        } else {
            $message = "Sorry, something went wrong. We are working on it and we'll get it fixed as soon as we can.";
        }

        return response()->json([
            'status' => $update,
            'message' => $message,
        ]);
    }

    public function destroy(Event $event)
    {
        $event->delete();
    }

    public function acceptInvitation()
    {
        $guest = Guest::whereEventId(request()->event_id)
                ->whereId(request()->guest_id)
                ->get()
                ->first()
                ->update(['status' => 1]);
        
        if ($guest) {
            $message = 'Accepted the Invitation';
        } else {
            $message = 'Something Went Wrong, Please try again';
        }

        return response()->json([
            'message' => $message,
            'status'  => $guest
        ]); 
    }

    public function getEventDetails($id)
    {

        $guests = "";
        $event = Event::find($id);
        $eventStart = renderDate($event->start_dt, 'l, F d, Y h:i A');
        $eventEnd = renderDate($event->end_dt, 'l, F d, Y h:i A');

        foreach ($event->guests as $key => $guest) {
            if ($key == 0) {
                $guests .= $guest->email;
            } else {
                $guests .= ',' . $guest->email;
            }
        }

        return response()->json([
            'event' => $event,
            'guests' => $guests,
            'convertedDates' => [
                'start' => $eventStart,
                'end' => $eventEnd,
            ]
        ]);
    }
}
