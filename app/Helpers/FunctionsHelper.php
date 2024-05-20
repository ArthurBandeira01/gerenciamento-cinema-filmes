<?php

namespace App\Helpers;

use Carbon\Carbon;

class FunctionsHelper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function timeToBrazil(string $time)
    {
        return date("H:i", strtotime($time));
    }

    public static function formatDateBrToSql(string $data): string
    {
        return Carbon::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    }

    public static function formatDateSqlToBr(string $data): string
    {
        return Carbon::createFromFormat('Y-m-d', $data)->format('d/m/Y');
    }

    public static function formatDecimalBrToSql(string $value): float
    {
        $value = preg_replace('/[^\d,]/', '', $value);
        $value = str_replace(',', '.', $value);
        return (float) $value;
    }

    public static function formatDecimalSqlToCurrencyBr(float $valor): string
    {
        return number_format($valor, 2, ',', '.');
    }

    public static function removeMaskCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        return $cpf;
    }

    public static function generateValidCPF() {
        $cpf = [];
        for ($i = 0; $i < 9; $i++) {
            $cpf[] = mt_rand(0, 9);
        }

        // Calculate first digit
        $d1 = 0;
        for ($i = 0, $x = 10; $i < 9; $i++, $x--) {
            $d1 += $cpf[$i] * $x;
        }
        $d1 = 11 - ($d1 % 11);
        $cpf[] = ($d1 >= 10) ? 0 : $d1;

        // Calculate second digit
        $d2 = 0;
        for ($i = 0, $x = 11; $i < 10; $i++, $x--) {
            $d2 += $cpf[$i] * $x;
        }
        $d2 = 11 - ($d2 % 11);
        $cpf[] = ($d2 >= 10) ? 0 : $d2;

        return implode('', $cpf);
    }

}
