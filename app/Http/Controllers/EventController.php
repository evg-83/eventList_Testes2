<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Models\Event;
use App\Models\User;
use App\Models\UsersParty;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function event()
    {
        $userAuth = auth()->user();
        $events   = Event::all();

        return view('event.event', compact('userAuth', 'events'));
    }

    public function store(StoreEventRequest $request)
    {
        $userId = auth()->user()->id;

        $dataEvent = [
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => $userId,
        ];

        $event = Event::firstOrCreate($dataEvent);

        $userAuth = auth()->user();

        $full_name = $userAuth->first_name . ' ' . $userAuth->last_name;

        $dataUsersParty = [
            'name'     => $full_name,
            'event_id' => $event->id,
            'login'    => $userAuth->login,
        ];

        UsersParty::firstOrCreate($dataUsersParty);

        $userIdEvents = $userAuth->events;
        foreach ($userIdEvents as $userIdEvent) {
            # code...
        }

        return redirect()->route('event.showEvent', $userIdEvent);
    }

    public function showEvent(Event $event)
    {
        $userAuth = auth()->user();
        $events   = Event::all();

        $usersParty = $event->usersParties;

        return view('event.showEvent', compact('event', 'events', 'userAuth', 'usersParty'));
    }

    public function show(UsersParty $usersParty)
    {
        $userAuth = auth()->user();

        $users = User::all();

        foreach ($users as $user) {
            $userLog = $user->where('login', $usersParty->login)->get();
        }

        return view('event.show', compact('usersParty', 'userLog', 'userAuth'));
    }

    public function update(Event $event)
    {
        $userAuth = auth()->user();

        $full_name = $userAuth->first_name . ' ' . $userAuth->last_name;

        $dataUsersParty = [
            'name'     => $full_name,
            'event_id' => $event->id,
            'login'    => $userAuth->login,
        ];

        $usersParty = new UsersParty();

        $usersParty->create($dataUsersParty);

        return redirect()->route('event.showEvent', $event->id);
    }

    public function deleteUserParty(Event $event)
    {
        $userAuth = auth()->user();

        $usersParty = $event->usersParties;

        foreach ($usersParty as $userParty) {
            $userParty->where('login', $userAuth->login)->delete();
        }

        return redirect()->route('event.showEvent', $event->id);
    }
}
