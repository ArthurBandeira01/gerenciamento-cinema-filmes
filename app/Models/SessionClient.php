<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SessionClient extends Model
{
    use HasFactory;

    protected $table = 'sessions_clients';
    protected $fillable = [
        'sessionRoomId',
        'cpf',
        'numberSeat',
    ];

    public function sessionRoom(): HasOne
    {
        return $this->hasOne(SessionRoom::class);
    }
}
