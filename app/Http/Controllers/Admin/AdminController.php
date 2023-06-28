<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Models\UsersParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $userAuth = auth()->user();
        $events   = Event::all();
        $users    = User::all();

        return view('admin.index', compact('users', 'userAuth', 'events'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
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

        return redirect()->route('event.showEvent', $userId);
    }

    public function show(User $user)
    {
        $userAuth = auth()->user();

        $events     = $user->events;

        return view('admin.show', compact('user', 'events', 'userAuth'));
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('admin.index');
    }
}
