<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Consultan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'position',
        'company',
        'specialty',
        'bio',
        'experience',
        'rating',
        'price_per_hour',
        'photo_profile',
        'is_active',
        'availability_status'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'decimal:2',
        'price_per_hour' => 'decimal:2',
        'experience' => 'integer'
    ];

    protected $attributes = [
        'is_active' => true,
        'rating' => 0,
        'availability_status' => 'available'
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function freeTrials(): HasMany
    {
        return $this->hasMany(FreeTrial::class);
    }

    // Scopes
    public function scopeActive($query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query): Builder
    {
        return $query->where('availability_status', 'available');
    }

    public function scopeBySpecialty($query, $specialty): Builder
    {
        return $query->where('specialty', 'like', '%' . $specialty . '%');
    }

    // Helper methods
    public function getFullNameAttribute(): string
    {
        return $this->name;
    }

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo_profile
            ? asset('storage/' . $this->photo_profile)
            : asset('images/default-avatar.png');
    }

    public function getExperienceTextAttribute(): string
    {
        if ($this->experience === 0) return 'Fresh Graduate';
        if ($this->experience === 1) return '1 Year Experience';
        return $this->experience . ' Years Experience';
    }

    public function getTotalBookingsAttribute(): int
    {
        return $this->bookings()->count();
    }

    public function getCompletedBookingsAttribute(): int
    {
        return $this->bookings()->where('status', 'completed')->count();
    }

    public function getActiveTrialsAttribute(): int
    {
        return $this->freeTrials()->active()->count();
    }

    public function updateRating(): void
    {
        $avgRating = $this->bookings()
            ->where('status', 'completed')
            ->whereNotNull('rating')
            ->avg('rating');

        $this->update(['rating' => $avgRating ?? 0]);
    }
}

// app/Models/Booking.php (Update existing)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'consultan_id',
        'free_trial_id', // Add this field
        'full_name',
        'email',
        'phone',
        'date',
        'time',
        'duration',
        'type',
        'topic',
        'notes',
        'status',
        'amount',
        'meeting_link',
        'rating',
        'feedback'
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
        'rating' => 'integer'
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function consultan(): BelongsTo
    {
        return $this->belongsTo(Consultan::class);
    }

    public function freeTrial(): BelongsTo
    {
        return $this->belongsTo(FreeTrial::class);
    }

    // Scopes
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('date', today());
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', today())
            ->whereIn('status', ['pending', 'confirmed']);
    }

    // Helper methods
    public function isFreeTrial(): bool
    {
        return $this->type === 'free' || !is_null($this->free_trial_id);
    }

    public function getFormattedAmountAttribute(): string
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'confirmed' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }

    public function canBeCancelled(): bool
    {
        return in_array($this->status, ['pending', 'confirmed'])
            && $this->date->isFuture();
    }
}
