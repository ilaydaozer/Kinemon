<?php

namespace App\Http\Controllers;

use App\Models\Event;

class NotificationController extends Controller
{
    public function notifications()
    {
        $events = Event::query()
            ->whereHas('invites', function($q) {
                $q->where('invitee_id', auth()->id());
            })
            ->orderByDesc('created_at',)
            ->get();

        return view('notifications/notification', compact('events'));
    }
}
