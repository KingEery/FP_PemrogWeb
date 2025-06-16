<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Nama tabel (opsional kalau nama tabel sama dengan jamak model)
    protected $table = 'events';

    // Field yang bisa diisi (mass assignment)
    protected $fillable = [
        'title',
        'location',
        'date',
        'category',
        'price',
        'image',
    ];
    public function description()
    {
        return $this->hasOne(EventsDescription::class, 'event_id');
    }
}
