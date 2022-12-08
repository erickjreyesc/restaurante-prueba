<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transacciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inventario_id', 'cliente_id', 'precio', 'cantidad'
    ];

    public function cliente()
    {
        return $this->belongsTo(\App\Models\Param\Cliente::class, 'cliente_id', 'id');
    }

    public function inventario()
    {
        return $this->hasMany(\App\Models\Admin\Inventario::class);
    }
}
