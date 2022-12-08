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

    public function numericFloatConverter($value)
    {
        $value = floatval($value);
        if (strstr($value, ",")) {
            return $value = str_replace(",", ".", $value);
        }
        return $value;
    }
}
