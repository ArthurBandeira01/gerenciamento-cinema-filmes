<?php

namespace App\Helpers;

use App\Models\SessionClient;
use App\Models\SessionRoom;
use Carbon\Carbon;

class SessionClientHelper
{
    public static function verifySeat($id, $numberSeat)
    {
        $verifySeat = SessionClient::where('sessionRoomId', $id)->where('numberSeat', $numberSeat)->first();

        if ($verifySeat) {
            return  "<div class='box-seat bg-red-700 hover:bg-red-600' onclick='unavailable()'>"
                        . $numberSeat .
                    " </div>";
        } else {
            return  "<div class='box-seat bg-green-700 hover:bg-green-600' onclick='available($id, $numberSeat)'>"
                        . $numberSeat .
                    " </div>";
        }

    }

}
