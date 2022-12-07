<?php

namespace App\Traits; 

use Carbon\Carbon;

trait DatetimeTrait
{
    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat(
            'Y-m-d H:i:s',
            Carbon::parse($this->attributes['created_at'])->toDateTimeString()
        )->format('d-m-Y h:i A');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat(
            'Y-m-d H:i:s',
            Carbon::parse($this->attributes['updated_at'])->toDateTimeString()
        )->format('d-m-Y h:i A');
    }

    public function getArticuloPublicacionAttribute()
    {
        if (is_null($this->attributes['articulo_publicacion'])) {
            return 'SF';
        }
        return Carbon::createFromFormat(
            'Y-m-d H:i:s',
            Carbon::parse($this->attributes['articulo_publicacion'])->toDateTimeString()
        )->format('D, d M  Y  H:i:s Z');
    }

    public function ConvertDate($fecha)
    {
        $newFecha = str_replace('/', '-', $fecha);

        $setFecha = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse($newFecha)->toDateTimeString())->format('Y-m-d H:i:s');
        return date($setFecha);
    }

    public function ConvertStandardDate($fecha, $format = 'Y-m-d')
    {
        $newFecha = str_replace('/', '-', $fecha);
        $setFecha = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse($newFecha)->toDateTimeString())->format($format);
        return date($setFecha);
    }

    public function getYearNow()
    {
        $fechaActual = Carbon::now();
        return $fechaActual;
    } 

    public function DiffDaysSimpleCalculate($start, $finish)
    {
        return $start->diffInDays($finish);
    }
}
