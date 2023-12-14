<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;
    //Inreverse relation of One to One
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
