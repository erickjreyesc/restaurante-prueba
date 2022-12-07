<?php

namespace App\Models\Actas;

use App\Traits\UtilityTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reunion extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UtilityTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reuniones';

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            dd($model);            
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'titulo', 'objetivo', 'nombre_convocador', 'departamento_convocador', 'cargo_convocador', 'orden', 'conclusiones', 'tipo_reunion_id', 'depconvocador_id'
    ];

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

    public function tipo_reunion()
    {
        return $this->belongsTo(\App\Models\Actas\TipoReunion::class, 'tipo_reunion_id', 'id');
    }

    public function compromisos()
    {
        return $this->hasMany(\App\Models\Actas\CompromisoReunion::class, 'reunion_id', 'id');
    }

    public function firmas()
    {
        return $this->hasMany(\App\Models\Actas\FirmaReunion::class, 'reunion_id', 'id');
    }

    public function calendario()
    {
        return $this->hasOne(\App\Models\Actas\CalendarioReunion::class, 'reunion_id', 'id');
    }

    public function invitados()
    {
        return $this->hasMany(\App\Models\Actas\InvitacionConvocatoria::class, 'reunion_id', 'id');
    }

    /**
     * Get the post's image.
     */
    public function archivo()
    {
        return $this->morphMany(\App\Models\Param\Media::class, 'mediable');
    }

    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $value)
    {
        return $query->where('codigo', 'like', '%' . $value . '%')
            ->orWhere('titulo', 'like', '%' . $value . '%')    
            ->orWhere('objetivo', 'like', '%' . $value . '%')
            ->orWhere('nombre_convocador', 'like', '%' . $value . '%')
            ->orWhere('cargo_convocador', 'like', '%' . $value . '%')
            ->orWhere('orden', 'like', '%' . $value . '%')
            ->orWhere('conclusiones', 'like', '%' . $value . '%');
    }
}
