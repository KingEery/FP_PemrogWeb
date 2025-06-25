<?php
// app/Models/Consultant.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Consultant extends Model
{
    use HasFactory;

    protected $table = 'consultants';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'bio',
        'position',
        'company',
        'specialty',
        'location',
        'rating',
        'total_reviews',
        'hourly_rate',
        'profile_image',
        'instagram_url',
        'linkedin_url',
        'experiences',
        'educations',
        'skills',
        'is_active'
    ];

    protected $casts = [
        'rating' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'is_active' => 'boolean',
        'total_reviews' => 'integer',
        'experiences' => 'array',
        'educations' => 'array',
        'skills' => 'array'
    ];

    // Relasi ke booking
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'consultant_id');
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

    // Accessor untuk backward compatibility
    public function getPricePerHourAttribute()
    {
        return $this->hourly_rate;
    }

    // Get profile image URL
    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            if (str_starts_with($this->profile_image, 'image/')) {
                return asset($this->profile_image);
            }
            return asset('storage/' . $this->profile_image);
        }
        return asset('image/default-avatar.jpg');
    }

    // Format rating untuk display
    public function getFormattedRatingAttribute()
    {
        return number_format($this->rating, 1);
    }

    // Get full position display
    public function getFullPositionAttribute()
    {
        if ($this->position && $this->company) {
            return $this->position . ' at ' . $this->company;
        }
        return $this->position ?: 'Consultant';
    }
}