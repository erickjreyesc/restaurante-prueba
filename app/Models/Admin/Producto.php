<?php

namespace App\Models\Admin;

use App\Traits\ModelTrait;
use App\Traits\UtilityTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    use UtilityTrait;
    use ModelTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'descripcion', 'precio', 'estado', 'tipo_producto_id'
    ];

    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $value)
    {
        return $query->where('codigo', 'like', '%' . $value . '%')
            ->orwhere('nombre', 'like', '%' . $value . '%')
            ->orwhere('descripcion', 'like', '%' . $value . '%');
    }

    /**
     * Set the 
     *
     * @param  string  $value
     * @return void
     */
    public function setCodigoAttribute($value)
    {
        return $this->attributes['codigo'] = $this->setUpper($value);
    }

    /**
     * Set the 
     *
     * @param  string  $value
     * @return void
     */
    public function setNombreAttribute($value)
    {
        return $this->attributes['nombre'] = $this->setUpper($value);
    }

    public function tipo_producto()
    {
        return $this->belongsTo(\App\Models\Param\TipoProducto::class, 'tipo_producto_id', 'id');
    }

    public function inventario()
    {
        return $this->hasMany(\App\Models\Admin\Inventario::class);
    }
    
    public function lastProducto()
    {
        $data = Inventario::where('producto_id', $this->id)->where('estado', 1)->orderby('id', 'DESC')->first();
        return $data;
    }
}
