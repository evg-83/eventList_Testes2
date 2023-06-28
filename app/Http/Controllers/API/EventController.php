<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\UsersParty;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response()->json($events, 200);
    }

    public function store(StoreEventRequest $request)
    {
        try {
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

            return response()->json([
                'message' => "Event successfully created."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function deleteEvent(Event $event)
    {
        try {
            $event->delete();

            return response()->json([
                'message' => "Event successfully deleted."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function showEvent(Event $event)
    {
        $userAuth = auth()->user();
        $events   = Event::all();

        $usersParty = $event->usersParties;

        if (!$event) {
            return response()->json([
                'message' => 'Event Not Found.'
            ], 404);
        }

        return response()->json([
            'userAuth'   => $userAuth,
            'events'     => $events,
            'usersParty' => $usersParty,
        ], 200);
    }

    public function showUser(UsersParty $usersParty)
    {
        $userAuth = auth()->user();

        $users = User::all();

        foreach ($users as $user) {
            $userLog = $user->where('login', $usersParty->login)->get();
        }

        if (!$usersParty) {
            return response()->json([
                'message' => 'User Party Not Found.'
            ], 404);
        }

        return response()->json([
            'userAuth' => $userAuth,
            'userLog' => $userLog,
            'usersParty' => $usersParty,
        ], 200);
    }

    public function addUserParty(Event $event)
    {
        try {
            $userAuth = auth()->user();

            $full_name = $userAuth->first_name . ' ' . $userAuth->last_name;

            $dataUsersParty = [
                'name'     => $full_name,
                'event_id' => $event->id,
                'login'    => $userAuth->login,
            ];

            $usersParty = new UsersParty();

            $usersParty->create($dataUsersParty);

            return response()->json([
                'message' => "User Party successfully created."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function deleteUserParty(Event $event)
    {
        try {
            $userAuth = auth()->user();

            $usersParty = $event->usersParties;

            foreach ($usersParty as $userParty) {
                $userParty->where('login', $userAuth->login)->delete();
            }

            return response()->json([
                'message' => "User Party successfully deleted."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }
}
