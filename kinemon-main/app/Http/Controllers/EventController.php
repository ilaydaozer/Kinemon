<?php

namespace App\Http\Controllers;

use App\Mail\InviteSent;
use App\Models\Event;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->whereHas('invites', function($q) {
                $q->where('invitee_id', auth()->id());
            })
            ->orWhere('created_by_id', auth()->id())
            ->orderByDesc('created_at',)
            ->get();

        return view('welcome', compact('events'));
    }

    public function create()
    {
        $friends = auth()->user()->friends;

        if (!count($friends)) {
            return redirect('friends')->withErrors(['msg' => 'Please add friends in order to create an event!']);
        }

        return view('events.create', compact('friends'));
    }

    public function store()
    {
        if (!request('invitees')) {
            return back()->withErrors(['msg' => 'Please invite friends to the event!']);
        }

        $path = \request()->file('img')->store('public/images');

        $event = Event::create([
            'name' => \request('name'),
            'address' => \request('address'),
            'date' => \request('date'),
            'detail' => \request('detail'),
            'img' => $path,
            'created_by_id' => auth()->id(),
        ]);

        foreach (request('invitees') as $inviteeID) {
            $invitee = User::find($inviteeID);

            $invite = Invite::create([
                'invitee_id' => $inviteeID,
                'event_id' => $event->id
            ]);

            Mail::to($invitee)->send(new InviteSent($invitee, $invite));
        }

        return redirect('/')->with('message', 'Success!');
    }

    public function detail(Event $event)
    {
        return view('events/detail', compact('event'));
    }
// Kabulse çalıştır,,,,,kontroller unutma
    public function accept(Event $event)
    {
        if (!$hasInvite = $event->invites()->where('invitee_id', auth()->id())->first()) {
            return back()->withErrors(['msg' => 'You are not invited to this event!']);
        }

        if ($hasInvite->will_attend !== null) {
            return back()->withErrors(['msg' => 'You already made your choice!']);
        }

        $hasInvite->update([
            'will_attend' => true,
        ]);

        return back()->with('message', 'Success!');
    }
 //// red ise çalıştır acceptten copy al fix et
    public function reject(Event $event)
    {
        if (!$hasInvite = $event->invites()->where('invitee_id', auth()->id())->first()) {
            return back()->withErrors(['msg' => 'You are not invited to this event!']);
        }

        if ($hasInvite->will_attend !== null) {
            return back()->withErrors(['msg' => 'You already made your choice!']);
        }

        $hasInvite->update([
            'will_attend' => false,
        ]);

        return back()->with('message', 'Success!');
    }
}
