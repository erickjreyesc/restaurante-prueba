<?php

namespace App\Models\Param;

use App\Traits\ActivityLogTrait;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOperacion extends Model
{
    use HasFactory;
    use ModelTrait;
    use ActivityLogTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_operacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion'];
}
