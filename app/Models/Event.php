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
        'events_description_id',
        'title',
        'location',
        'date',
        'category',
        'price',
        'image',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Relation to EventsDescription (belongs to)
    public function description()
    {
        return $this->belongsTo(EventsDescription::class, 'events_description_id');
    }

    // Boot method to prevent manual Event creation (optional)
    protected static function boot()
    {
        parent::boot();

        // Optional: Add validation or constraints
        static::creating(function ($event) {
            // Ensure events_description_id is present
            if (!$event->events_description_id) {
                throw new \Exception('Event must be associated with an EventsDescription');
            }
        });
    }

    // Scopes for filtering
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now()->toDateString());
    }

    public function scopePast($query)
    {
        return $query->where('date', '<', now()->toDateString());
    }

    // Accessors
    public function getFormattedDateAttribute()
    {
        return $this->date->format('d M Y');
    }

   public function getFormattedPriceAttribute()
    {
        if ($this->price == '0' || empty($this->price)) {
            return 'Free';
        }

        // Pastikan harga valid sebelum diformat
        if (is_numeric($this->price)) {
            return 'Rp ' . number_format((float) $this->price, 0, ',', '.');
        }

        // Jika bukan angka, beri fallback (misal Rp 0 atau Free)
        return 'Rp 0';
    }


    public function getIsUpcomingAttribute()
    {
        return $this->date >= now()->toDateString();
    }
}