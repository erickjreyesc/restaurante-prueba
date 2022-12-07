<?php

namespace App\Models\Actas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompromisoReunion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'compromiso_reuniones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'compromiso', 'responsable', 'correo_responsable', 'fecha_limite', 'avance', 'reunion_id'
    ];

    public function reunion()
    {
        return $this->belongsTo(\App\Models\Actas\Reunion::class, 'id', 'reunion_id');
    }
}
