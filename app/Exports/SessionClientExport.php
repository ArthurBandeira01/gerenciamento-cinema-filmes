<?php

namespace App\Exports;

use App\Models\SessionClient;
use Maatwebsite\Excel\Concerns\FromCollection;

class SessionClientExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SessionClient::all();
    }
}
