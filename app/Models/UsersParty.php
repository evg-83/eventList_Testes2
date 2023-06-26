<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersParty extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = 'users_parties';

    protected $fillable = [
        'name',
        'event_id',
        'login',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
