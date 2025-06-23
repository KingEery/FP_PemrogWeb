<?php
// app/Models/FreeTrial.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FreeTrial extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultant_id',
        'title',
        'description',
        'duration',
        'max_participants',
        'used_slots',
        'is_active',
        'valid_until',
        'date',
        'time',
        'meeting_link',
        'requirements'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'valid_until' => 'datetime',
        'date' => 'date'
    ];

    protected $attributes = [
        'used_slots' => 0,
        'is_active' => true
    ];

    // Relationships
    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'free_trial_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('valid_until')
                    ->orWhere('valid_until', '>', now());
            });
    }

    // Helper methods
    public function hasAvailableSlots(): bool
    {
        return $this->used_slots < $this->max_participants;
    }

    public function getAvailableSlotsAttribute(): int
    {
        return $this->max_participants - $this->used_slots;
    }

    public function getPercentageUsedAttribute(): float
    {
        if ($this->max_participants === 0) return 0;
        return round(($this->used_slots / $this->max_participants) * 100, 2);
    }

    public function isExpired(): bool
    {
        return $this->valid_until && $this->valid_until->isPast();
    }

    public function canBeClaimed(): bool
    {
        return $this->is_active && $this->hasAvailableSlots() && !$this->isExpired();
    }

    public function incrementUsedSlots(): void
    {
        $this->increment('used_slots');
    }

    public function decrementUsedSlots(): void
    {
        if ($this->used_slots > 0) {
            $this->decrement('used_slots');
        }
    }
}
