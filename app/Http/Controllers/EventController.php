<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Models\UsersParty;

class EventController extends Controller
{
    public function index(Event $event)
    {
        $userAuth = auth()->user();
        $events   = Event::all();

        $usersParty = $event->usersParties;

        return view('event.index', compact('event', 'events', 'userAuth', 'usersParty'));
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

        return redirect()->route('event.index', $event->id);
    }

    public function deleteUserParty(Event $event)
    {
        $userAuth = auth()->user();

        $usersParty = $event->usersParties;

        foreach ($usersParty as $userParty) {
            $userParty->where('login', $userAuth->login)->delete();
        }

        return redirect()->route('event.index', $event->id);
    }
}
