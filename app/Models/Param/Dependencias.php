<?php

namespace App\Models\Param;

use App\Traits\ModelTrait;
use App\Traits\UtilityTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependencias extends Model
{
    use HasFactory;
    use ModelTrait;
    use SoftDeletes;
    use UtilityTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dependencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'sigla', 'estado'
    ];

    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $value)
    {
        return $query->where('codigo', 'like', '%' . $this->setUpper($value) . '%')
            ->orWhere('nombre', 'like', '%' . $value . '%')
            ->orWhere('sigla', 'like', '%' . $this->setUpper($value) . '%');
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
    public function setSiglaAttribute($value)
    {
        return $this->attributes['sigla'] = $this->setUpper($value);
    }
}
