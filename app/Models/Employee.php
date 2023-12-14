<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Model
{
    use HasFactory, LogsActivity;
    //mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'joining_date',
        'salary',
        'is_active',
        'file'
    ];
    // all the fields require to fill
    // protected $guarded=[];
    
    // protected static $logAttributes = ['*'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    //Reverse has many
    public function department() {
        return $this->belongsTo(Department::class);
    }
}
