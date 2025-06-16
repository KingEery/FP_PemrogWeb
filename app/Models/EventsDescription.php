<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsDescription extends Model
{
    use HasFactory;

    protected $table = 'events_description';

    protected $fillable = [
        'event_id',
        'title',
        'image',
        'category',
        'overview',
        'what_youll_learn',
        'terms_conditions',
        'price_original',
        'price_discounted',
        'speaker_name',
        'speaker_title',
        'dates',
        'time',
        'location',
        'includes',
    ];

    protected $casts = [
        'what_youll_learn' => 'array',
        'terms_conditions' => 'array',
        'dates' => 'array',
        'includes' => 'array',
    ];

     /**
     * Relasi inverse one-to-one dengan model Event
     * Setiap deskripsi event dimiliki oleh satu event
     */
    // public function description(): HasOne
    // {
    //     return $this->hasOne(MentoringDescription::class, 'mentoring_id');
    // }

   
    /**
     * Accessor untuk memformat tanggal
     */
    public function getFormattedDatesAttribute()
    {
        return collect($this->dates)->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d M Y');
        })->implode(', ');
    }

    /**
     * Accessor untuk harga diskon
     */
    public function getFinalPriceAttribute()
    {
        return $this->price_discounted ?? $this->price_original ?? 'Gratis';
    }
}