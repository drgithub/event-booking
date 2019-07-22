<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Admin\BaseController as Controller;

class EventController extends Controller
{
    public function index()
    {
        return View::make('admin::events.index');
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
            array_push($newGuestList, new \App\Guest(['email' => $guest]));
        }

        if ($event->guests()->saveMany($newGuestList)) {
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
        // dd($event->start_dt->to);
        $guestEmail1 = "guest ";
        $guestEmail2 = "guest2 ";

        return View::make('admin::events.edit', compact('event', 'guestEmail1', 'guestEmail2'));
    }

    public function update(Request $request, Event $event)
    {
        $update = $event->update($request->except('guests_email'));
        
        if ($update) {
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
}
