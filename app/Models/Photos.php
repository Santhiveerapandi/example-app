<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Spatie\Activitylog\LogOptions;

Relation::morphMap([
    'User'=>'App\Models\User',
    'Company'=>'App\Models\Company',
    'Product'=>'App\Models\Product'
]);
class Photos extends Model
{
    use HasFactory;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public function transaction() {
        return $this->morphTo();
    }
}
