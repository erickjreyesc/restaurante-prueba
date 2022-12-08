<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventario';

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            DB::update("update " . $model->table . " set estado = 0 where producto_id = ?", [
                $model->producto_id
            ]);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'producto_id', 'tipo_operacion_id', 'ingreso', 'egreso', 'total'
    ];

    public function producto()
    {
        return $this->belongsTo(\App\Models\Admin\Producto::class, 'producto_id', 'id');
    }

    public function tipo_operacion()
    {
        return $this->belongsTo(\App\Models\Param\TipoOperacion::class, 'tipo_operacion_id', 'id');
    }
}
