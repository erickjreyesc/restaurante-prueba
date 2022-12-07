<?php

namespace App\Traits;

use App\Models\Actas\Reunion;
use App\Models\Actas\TipoReunion;
use App\Models\Param\Media;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait UtilityTrait
{
    public $loading = false;

    public function setSlug($titulo, $enlace = null)
    {
        return (!empty(trim($enlace))) ? $enlace : '/contenido/' . $this->slug($titulo);
    }

    public function setUpper($value)
    {
        return Str::upper($value);
    }

    public function setTitleSlug($slug)
    {
        return str_replace('-', ' ', Str::ucfirst($slug));
    }

    public function StrRandom($value)
    {
        return Str::random($value);
    }

    public function setDirectory($codigo)
    {
        return str_replace('-', '', $codigo);
    }

    public function slug($slug)
    {
        return Str::slug($slug);
    }

    public function setEstado($value = false)
    {
        return ($value) ? true : false;
    }

    public function CamellCaseString($value)
    {
        return Str::ucfirst($value);
    }

    public function getAuthUser()
    {
        return (auth()->user()) ? auth()->user()->id : null;
    }

    public function getAuthUserDependency()
    {
        return (auth()->user()) ? auth()->user()->dependencia_id : null;
    }

    public function setRandomString($long = 50)
    {
        return Str::random($long);
    }

    public function showmorefilter()
    {
        $this->enabledfiltro = !$this->enabledfiltro;
    }

    public function setLower($value)
    {
        return Str::lower($value);
    }

    public function setCode($tipo = 1)
    {
        $randint = rand(1000, 9999);
        $count = Reunion::whereYear('created_at', Carbon::now()->year)->count();
        $acronimo = TipoReunion::find($tipo);
        $setanio = (intval($acronimo->anio) == 1) ? Carbon::now()->format('Y') : null;
        $setmes = (intval($acronimo->mes) == 1) ? Carbon::now()->format('m') : null;
        $setdia = (intval($acronimo->dia) == 1) ? Carbon::now()->format('d') : null;
        $setacronimo = (intval($acronimo->asignar) == 1) ? $acronimo->acronimo : null;
        $formato = "${setacronimo}${randint}${setanio}${setmes}${setdia}%04d";
        $formatCount = sprintf($formato, $count + 1);
        return $formatCount;
    }
}
