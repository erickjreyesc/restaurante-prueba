<?php

namespace App\Models\Actas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmaReunion extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'firma_reuniones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reunion_id', 'nombre', 'cargo', 'firmado'
    ];

    public function reunion()
    {
        return $this->belongsTo(\App\Models\Actas\Reunion::class, 'id', 'reunion_id');
    }
}
