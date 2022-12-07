<?php

namespace App\Traits;

use Carbon\Carbon;

trait StaticBladeTrait
{
    public static function BooleanText($value)
    {
        return (intval($value) == 1) ? 'Sí' : 'No';
    }

    public static function getMoneyValue($value)
    {
        $currency =  number_format($value, 2, ',', '.');
        return 'COP ' . $currency;
    }



    public static function listarFechas($inicio, $final = null)
    {
        if (!is_null($final)) {
            return "Desde " . self::FullSpanishFormatDate($inicio) . " al " . self::FullSpanishFormatDate($final);
        } else {
            return self::FullSpanishFormatDate($inicio);
        }
    }

    public static function SimpleSpanishFormatDate($fecha, $formato = 'd-m-Y')
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $fecha)->format($formato);
    }

    public static function FullSpanishFormatDate($fecha)
    {
        $fechaFormato = self::SimpleSpanishFormatDate($fecha);
        $formatoFull = Carbon::parse($fechaFormato);
        return $formatoFull->isoFormat('LL');
    }

    public static function SimpleFormatDate($fecha)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse($fecha)->toDateTimeString())->format('Y-m-d');
    }

    public static function DiffDays($startday, $finishday)
    {
        $newday = explode("-", $startday);
        $Limitday = explode("-", $finishday);
        $formatoStart = Carbon::create(explode(" ", $newday[2])[0], $newday[1], $newday[0]);
        $formatoFinish = Carbon::create($Limitday[0], $Limitday[1], $Limitday[2]);
        if ($formatoStart->diffInDays($formatoFinish) <= 15) {
            return true;
        }
        return false;
    }

    public static function setCodeExcel($codigo)
    {
        if (intval($codigo)) {
            return  "'" . $codigo;
        }
        return $codigo;
    }
}
