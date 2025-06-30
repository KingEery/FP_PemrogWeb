<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'konten',
    ];
    public function CourseDescription()
    {
        return $this->belongsTo(CourseDescription::class);
    }
}
