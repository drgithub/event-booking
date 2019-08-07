<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EventController extends Controller
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
        $result = Guest::where('fkey', $request->input('fkey'))
            ->update(['status' => $request->input('response')]);

        if ($result) {
            return response()->json([
                'status' => $result,
            ]);
        }
    }
}
