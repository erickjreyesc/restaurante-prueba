<?php

namespace App\Models\Config;

use Spatie\Activitylog\Models\Activity;

class Registro extends Activity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activity_log';

    public function usuario()
    {
        return $this->belongsTo(\App\Models\User::class, 'causer_id'); //arg1 - Model, arg2 - foreign key
    }

    /**
     * Scope a query to only include
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        $dataquery = $query
            ->where('properties', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('subject_type', 'like', '%' . $search . '%');
        return $dataquery;
    }
}
