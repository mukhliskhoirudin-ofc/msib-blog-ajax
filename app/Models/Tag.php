<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'uuid', 'name', 'slug'
    ];

    protected static function booted()
    {
        static::creating(function ($model){
            $model->uuid = (string) Str::uuid();
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model){
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
