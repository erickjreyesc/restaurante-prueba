<?php

namespace App\Models\Actas;

use App\Traits\ModelTrait;
use App\Traits\UtilityTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoReunion extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ModelTrait;
    use UtilityTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_reuniones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acronimo', 'nombre', 'descripcion', 'estado'
    ];

    public function reunion()
    {
        return $this->hasOne(\App\Model\Actas\Reunion::class, 'tipo_reunion_id', 'id');
    }

    /**
     * Set the 
     *
     * @param  string  $value
     * @return void
     */
    public function setAcronimoAttribute($value)
    {
        return $this->attributes['acronimo'] = $this->setUpper($value);
    }

    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $value)
    {
        return $query->where('acronimo', 'like', '%' . $this->setUpper($value) . '%')
            ->orWhere('nombre', 'like', '%' . $value . '%')
            ->orWhere('descripcion', 'like', '%' . $value . '%');
    }
}
