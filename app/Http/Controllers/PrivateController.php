<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use App\Mail\GuestEventResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class PrivateController extends Controller
{
    public function invitationForm(Request $request)
    {
        if ($request->has('fkey') && $request->input('fkey')) {
            $data = Guest::where('fkey', $request->input('fkey'))
                ->with('event')
                ->first();
            
            if (!$data) return null;

            return View::make('eventInvitationForm', compact('data'));
        }        
    }

    public function respondToEvent(Request $request)
    {
        $response = $request->input('response');

        $guest = Guest::where('fkey', $request->input('fkey'))
                        ->get()
                        ->first();
        
        $result = $guest->update(['status' => $request->input('response')]);
        
        if ($response == 1) {
            $responseText = "Accepted";
        } else if ($response == 2) {
            $responseText = "Tentatively Accepted";
        } else if ($response == 3) {
            $responseText = "Declined";
        }

        if ($result ) {
            if ($response != 0) {
                Mail::to('eventbookingrd22@gmail.com')->send(new GuestEventResponse($guest, $guest->event, $responseText));
            }

            return response()->json([
                'status' => $result,
            ]);
        }
    }

    public function view() {
        if (request()->has('id') && request()->input('id')) {
            $data = Guest::whereId(request()->input('id'))
                ->with('event')
                ->first();
            
            if (!$data) return null;

            return View::make('private.eventView', compact('data'));
        }   
    }
}
