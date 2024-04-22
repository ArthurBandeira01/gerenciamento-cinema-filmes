<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionRoom extends Model
{
    use HasFactory;

    protected $table = 'sessions_rooms';
    protected $fillable = [
        'roomId',
        'movie',
        'movieImage',
        'numberSeats',
        'priceTicket',
        'sessionDate',
        'sessionTime',
        'status'
    ];

    public function room(): HasOne
    {
        return $this->hasOne(Room::class, 'id', 'roomId');
    }

    public function sessionClient(): BelongsTo
    {
        return $this->belongsTo(SessionClient::class);
    }
}
