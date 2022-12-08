<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'producto_id', 'tipo_operacion_id', 'ingreso', 'egreso', 'total'
    ];

    public function productos()
    {
        return $this->belongsTo(\App\Models\Admin\Producto::class, 'id', 'producto_id');
    }

    public function tipo_operacion()
    {
        return $this->belongsTo(\App\Models\Param\TipoOperacion::class, 'tipo_operacion_id', 'id');
    }
}
