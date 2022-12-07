<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait FormTrait
{
    use DatetimeTrait;

    public $enabledfiltro = false;

    public function CambiarAtributoEstado(Model $model)
    {
        $visible = ($model->estado) ? 0 : 1;
        $model->estado = (bool) $visible;
        $model->save();
    }

    public function DeleteModel(Model $model)
    {
        $model->delete();
    }
}
