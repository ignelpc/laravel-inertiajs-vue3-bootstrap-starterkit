<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(
            function (Model $model) {
                if (!$model->getKey()) {
                    $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
                }
            }
        );

        static::saving(
            function ($model) {
                $primaryKey = $model->getOriginal('id');

                if ($primaryKey !== $model->id) {
                    $model->id = $primaryKey;
                }
            }
        );
    }
}
