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
            $eventsDescription->createEvent();
        });

        static::updated(function ($eventsDescription) {
            if ($eventsDescription->event) {
                $eventsDescription->updateEvent();
            } else {
                $eventsDescription->createEvent();
            }
        });
    }

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

    private function getFirstDate()
    {
        if (is_array($this->dates) && !empty($this->dates)) {
            $firstDate = $this->dates[0];
            return is_array($firstDate) ? $firstDate['date'] : $firstDate;
        }
        return now()->format('Y-m-d');
    }

  
    
    // Method untuk display yang tidak menggunakan accessor (untuk keperluan lain)
    public function getDisplayWhatYoullLearn()
    {
        $data = is_array($this->what_youll_learn) ? $this->what_youll_learn : json_decode($this->what_youll_learn, true);
        
        if (isset($data[0])) {
            if (is_array($data[0])) {
                return array_column($data, 'item');
            }
            return $data;
        }
        
        return [];
    }

    public function getDisplayTermsConditions()
    {
        $data = is_array($this->terms_conditions) ? $this->terms_conditions : json_decode($this->terms_conditions, true);
        
        if (isset($data[0])) {
            if (is_array($data[0])) {
                return array_column($data, 'term');
            }
            return $data;
        }
        
        return [];
    }

    public function getDisplayDates()
    {
        $data = is_array($this->dates) ? $this->dates : json_decode($this->dates, true);
        
        if (isset($data[0])) {
            if (is_array($data[0])) {
                return array_column($data, 'date');
            }
            return $data;
        }
        
        return [];
    }

    public function getDisplayIncludes()
    {
        $data = is_array($this->includes) ? $this->includes : json_decode($this->includes, true);
        
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
        return collect($this->getDisplayDates())->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d M Y');
        })->implode(', ');
    }

    public function getFinalPriceAttribute()
    {
        return $this->price_discounted ?? $this->price_original ?? '0';
    }

    public function getFinalPrice()
    {
        return $this->price_discounted ?? $this->price_original ?? '0';
    }
}