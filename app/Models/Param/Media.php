<?php

namespace App\Models\Param;

use App\Traits\ActivityLogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    use ActivityLogTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'media_link', 'media_titulo', 'media_descripcion', 'mime_type'
    ];

    /**
     * Get the parent mediable model (user or post).
     */
    public function mediable()
    {
        return $this->morphTo();
    }
}
