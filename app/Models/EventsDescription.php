<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsDescription extends Model
{
    use HasFactory;

    protected $table = 'events_description';

    protected $fillable = [
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

    // Relation to Event (one-to-one)
    public function event()
    {
        return $this->hasOne(Event::class, 'events_description_id');
    }

    // Boot method to automatically create Event when EventsDescription is created
    protected static function boot()
    {
        parent::boot();

        static::created(function ($eventsDescription) {
            // Automatically create Event record when EventsDescription is created
            $eventsDescription->createEvent();
        });

        static::updated(function ($eventsDescription) {
            // Update Event record when EventsDescription is updated
            if ($eventsDescription->event) {
                $eventsDescription->updateEvent();
            } else {
                $eventsDescription->createEvent();
            }
        });
    }

    /**
     * Create Event record based on EventsDescription data
     */
    public function createEvent()
    {
        return Event::create([
            'events_description_id' => $this->id,
            'title' => $this->title,
            'location' => $this->location,
            'date' => $this->getFirstDate(),
            'category' => $this->category,
            'price' => $this->getFinalPrice(),
            'image' => $this->image ?? '',
        ]);
    }

    /**
     * Update Event record based on EventsDescription data
     */
    public function updateEvent()
    {
        if ($this->event) {
            $this->event->update([
                'title' => $this->title,
                'location' => $this->location,
                'date' => $this->getFirstDate(),
                'category' => $this->category,
                'price' => $this->getFinalPrice(),
                'image' => $this->image ?? '',
            ]);
        }
    }

    /**
     * Get first date from dates array
     */
    private function getFirstDate()
    {
        if (is_array($this->dates) && !empty($this->dates)) {
            $firstDate = $this->dates[0];
            return is_array($firstDate) ? $firstDate['date'] : $firstDate;
        }
        return now()->format('Y-m-d');
    }

    // Accessors for JSON fields
    public function getWhatYoullLearnAttribute($value)
    {
        $data = is_array($value) ? $value : json_decode($value, true);
        
        if (isset($data[0])) {
            if (is_array($data[0])) {
                return array_column($data, 'item');
            }
            return $data;
        }
        
        return [];
    }

    public function getTermsConditionsAttribute($value)
    {
        $data = is_array($value) ? $value : json_decode($value, true);
        
        if (isset($data[0])) {
            if (is_array($data[0])) {
                return array_column($data, 'term');
            }
            return $data;
        }
        
        return [];
    }

    public function getDatesAttribute($value)
    {
        $data = is_array($value) ? $value : json_decode($value, true);
        
        if (isset($data[0])) {
            if (is_array($data[0])) {
                return array_column($data, 'date');
            }
            return $data;
        }
        
        return [];
    }

    public function getIncludesAttribute($value)
    {
        $data = is_array($value) ? $value : json_decode($value, true);
        
        if (isset($data[0])) {
            if (is_array($data[0])) {
                return array_column($data, 'item');
            }
            return $data;
        }
        
        return [];
    }

    public function getFormattedDatesAttribute()
    {
        return collect($this->dates)->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d M Y');
        })->implode(', ');
    }

    /**
     * Accessor untuk harga final
     */
    public function getFinalPriceAttribute()
    {
        return $this->price_discounted ?? $this->price_original ?? '0';
    }

    /**
     * Get final price for Event table
     */
    public function getFinalPrice()
    {
        return $this->price_discounted ?? $this->price_original ?? '0';
    }
}