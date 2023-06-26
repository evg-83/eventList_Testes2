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
        $users = User::all();

        return view('admin.index', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // $dataUser = [
        //     'login'         => $request->login,
        //     'password'      => Hash::make($request->password),
        //     'first_name'    => $request->first_name,
        //     'last_name'     => $request->last_name,
        //     'date_of_birth' => $request->date_of_birth,
        // ];

        // $user = User::firstOrCreate($dataUser);
        $userId = auth()->user()->id;
        // dd( $user );

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

        return redirect()->route('event.index', $userId);
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
        // dd( $usersParty );

        return view('admin.show', compact('user', 'events', 'usersParty'));
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('admin.index');
    }
}
