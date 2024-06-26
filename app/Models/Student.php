<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, HasUuids;

    protected $table = "students";

    // yg bisa diedit
    protected $fillable = [
        'nrp',
        'name',
        'address',
    ];

    // yg ga muncul ketika di query/fetch
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'student_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
