<?php

namespace App\Http\Controllers\Account;

use App\Guest;
use App\Http\Controllers\Account\BaseController as Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $events = Guest::where('email', $user->email)
            ->with('event')
            ->get();

        $filteredEvents = [
            'comming' => [],
            'pending' => [],
            'missed' => [],
            'recent' => []
        ];

        foreach ($events as $guest) {
            if (!$guest->event) continue;

            $startDate = new Carbon($guest->event->start_dt); 

            if ($guest->status === config('variables.GUEST_EVENT_STATUS.PENDING')) {
                array_push($filteredEvents['pending'], $guest);
            } elseif ($startDate->greaterThan(Carbon::now())) {
                array_push($filteredEvents['comming'], $guest);
            } elseif ($guest->status === config('variables.GUEST_EVENT_STATUS.ACCEPTED'
                && Carbon::now()->greaterThan($startDate))) {
                array_push($filteredEvents['recent'], $guest);
            } elseif (($guest->status === config('variables.GUEST_EVENT_STATUS.DENIED')
                || $guest->status === config('variables.GUEST_EVENT_STATUS.PENDING')
                || $guest->status === config('variables.GUEST_EVENT_STATUS.MAYBE'))
                && Carbon::now()->greaterThan($startDate)) {
                array_push($filteredEvents['missed'], $guest);
            }
        }

        return View::make('account::index', compact('filteredEvents'));
    }
}
