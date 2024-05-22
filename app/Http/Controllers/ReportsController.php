<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Exports\SessionRoomExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function reportByMovie()
    {
        $timeNow = date('d-m-Y H:i:s');
        return Excel::download(new SessionRoomExport, 'relatorio-por-filme'.$timeNow.'.xlsx');
    }

    public function reportByWeek()
    {

    }

    public function reportMoreViewed()
    {

    }
}
