<?php
// app/Models/Consultant.php - FIXED VERSION

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Consultant extends Model
{
    use HasFactory;

    protected $table = 'consultants';

    // PERBAIKAN: Fillable sesuai dengan kolom database yang ada
    protected $fillable = [
        'name',
        'email',
        'phone',
        'bio',
        'specialty',
        'rating',
        'total_reviews',
        'hourly_rate',
        'profile_image',
        'is_active'
    ];

    protected $casts = [
        'rating' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'is_active' => 'boolean',
        'total_reviews' => 'integer'
    ];

    // Relasi ke booking
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'consultant_id');
    }

    // Relasi ke free trials
    public function freeTrials(): HasMany
    {
        return $this->hasMany(FreeTrial::class, 'consultant_id');
    }

    // Scope untuk consultant aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk consultant berdasarkan specialty
    public function scopeBySpecialty($query, $specialty)
    {
        return $query->where('specialty', 'like', '%' . $specialty . '%');
    }

    // Helper methods
    public function getTotalBookingsAttribute(): int
    {
        return $this->bookings()->count();
    }

    public function getCompletedBookingsAttribute(): int
    {
        return $this->bookings()->where('status', 'completed')->count();
    }

    public function getTotalRevenueAttribute(): float
    {
        return $this->bookings()
            ->where('status', 'completed')
            ->sum('amount');
    }

    public function isAvailable(): bool
    {
        return $this->is_active;
    }

    // PERBAIKAN: Accessor untuk backward compatibility
    public function getPricePerHourAttribute()
    {
        return $this->hourly_rate;
    }
}
