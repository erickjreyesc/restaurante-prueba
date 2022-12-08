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
}
