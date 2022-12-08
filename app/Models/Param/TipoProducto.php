<?php

namespace App\Models\Param;

use App\Traits\ActivityLogTrait;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;
    use ModelTrait;
    use ActivityLogTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_producto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'estado'];

    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'like', '%' . $value . '%')->orwhere('descripcion', 'like', '%' . $value . '%');
    }

    public function producto()
    {
        return $this->hasOne(\App\Models\Admin\Producto::class, 'tipo_operacion_id', 'id');
    }
}
