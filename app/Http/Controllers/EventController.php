<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Models\UsersParty;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(User $user)
    {
        $events = Event::all();
        $eventsUserId = $user->events;

        // foreach ($eventsUserId as $eventUserId) {
        //     if ($eventUserId->user_id == $user->id) {
        //         $userShow = $eventUserId->user_id;
        //     }
        // }

        foreach ($events as $event) {
            if ($event->user_id == $user->id) {
                $usersParty = $event->usersParties;
                // dd( $usersParty );
            }
        }

        $userAuth = auth()->user();

        $users = User::all();

        foreach ($eventsUserId as $eventUserId) {
            foreach ($users as $userAll) {
                if ($userAll->id == $eventUserId->user_id) {
                    foreach ($usersParty as $userParty) {
                        if ($userParty->login == $userAll->login) {
                            $userIdShow = $userAll->id;
                            // dd( $userIdShow );
                        }
                    }
                }
            }
        }

        return view('event.index', compact('user', 'events', 'eventsUserId', 'usersParty', 'userAuth', 'userIdShow'));
    }

    public function show(User $user)
    {
        $events     = $user->events;

        $eventsForParty = Event::all();

        foreach ($eventsForParty as $eventForParty) {
            if ($eventForParty->user_id == $user->id) {
                $usersParty = $eventForParty->usersParties;
            }
        }

        return view('event.show', compact('user', 'events', 'usersParty'));
    }

    public function update(User $user)
    {
        $userAuth = auth()->user();

        $full_name = $userAuth->first_name . ' ' . $userAuth->last_name;

        $events     = $user->events;

        foreach ($events as $event) {
            $dataUsersParty = [
                'name'     => $full_name,
                'event_id' => $event->id,
                'login'    => $userAuth->login,
            ];
        }

        $usersParty = new UsersParty();

        $usersParty->create($dataUsersParty);

        return redirect()->route('event.index', $user->id);
    }

    public function deleteUserParty(User $user)
    {
        $userAuth = auth()->user();
        $events   = $user->events;

        $eventsForParty = Event::all();

        foreach ($eventsForParty as $eventForParty) {
            if ($eventForParty->user_id == $user->id) {
                $usersParty = $eventForParty->usersParties;
                // dd( $usersParty );
            }
        }

        foreach ($events as $event) {
            foreach ($usersParty as $userParty) {
                if ($event->id == $userParty->event_id) {
                    UsersParty::where('login', $userAuth->login)->delete();
                }
            }
        }

        return redirect()->route('event.index', $user->id);
    }
}
