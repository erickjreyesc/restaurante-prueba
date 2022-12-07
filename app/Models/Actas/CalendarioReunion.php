<?php

namespace App\Models\Actas;

use App\Traits\ActivityLogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class CalendarioReunion extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ActivityLogTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendario_reuniones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_reunion', 'lugar_reunion', 'fecha_proxima', 'lugar_proxima', 'reunion_id'
    ];

    public function reunion()
    {
        return $this->belongsTo(\App\Models\Actas\Reunion::class, 'id', 'reunion_id');
    }
}
