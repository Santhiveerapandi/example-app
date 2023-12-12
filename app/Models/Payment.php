<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{
    use HasFactory,LogsActivity;
    // protected static $logAttributes = ['*'];
    public function getActivitylogOptions(): LogOptions
    {
        // return LogOptions::defaults();
        $log=new LogOptions();
        return $log->logAll();
    }
}
