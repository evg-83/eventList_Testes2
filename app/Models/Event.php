<?php

namespace App\Models;

use App\Models\User;
use App\Models\UsersParty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersParties()
    {
        return $this->hasMany(UsersParty::class);
    }
}
