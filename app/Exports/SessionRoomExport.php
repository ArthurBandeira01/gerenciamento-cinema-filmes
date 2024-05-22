<?php

namespace App\Exports;

use App\Helpers\FunctionsHelper;
use App\Models\SessionRoom;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SessionRoomExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    public function query()
    {
        return SessionRoom::query()
                ->select('id', 'roomId', 'movie', 'movieImage', 'numberSeats', 'priceTicket', 'sessionDate', 'sessionTime')
                ->addSelect(\DB::raw('sessions_rooms."numberSeats" * sessions_rooms."priceTicket" as total_revenue'))
                ->orderBy('total_revenue', 'desc');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Sala',
            'Filme',
            'Ingresso (R$)',
            'Valor arrecadado (R$)',
            'Data',
            'Hora'
        ];
    }

    public function map($sessionRoom): array
    {
        return [
            $sessionRoom->id,
            $sessionRoom->room->name,
            $sessionRoom->movie,
            FunctionsHelper::formatDecimalSqlToCurrencyBr($sessionRoom->priceTicket),
            FunctionsHelper::formatDecimalSqlToCurrencyBr($sessionRoom->priceTicket * $sessionRoom->numberSeats), // Calcula o valor arrecadado
            FunctionsHelper::formatDateSqlToBr($sessionRoom->sessionDate),
            FunctionsHelper::timeToBrazil($sessionRoom->sessionTime)
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para a linha de cabeçalho
            1 => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]
            ],
            // Estilo para todas as colunas
            'A' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'B' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'C' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT]],
            'D' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT]],
            'E' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT]],
            'F' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'G' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 15,
            'C' => 45,
            'D' => 20,
            'E' => 25,
            'F' => 15,
            'G' => 15,
        ];
    }
}
