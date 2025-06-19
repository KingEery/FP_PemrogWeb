<?php
// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'consultan_id',
        'full_name',
        'email',
        'phone',
        'date',
        'time',
        'duration',
        'type',
        'status',
        'topic',
        'notes',
        'amount',
        'meeting_link',
        'free_trial_id' // Added this field
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2'
    ];

    // Constants for booking status
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    // Constants for booking type
    const TYPE_ONLINE = 'online';
    const TYPE_OFFLINE = 'offline';

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

    // Accessor methods
    public function getFullDateTimeAttribute(): string
    {
        return $this->date->format('Y-m-d') . ' ' . $this->time;
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->date->format('d M Y');
    }

    public function getFormattedTimeAttribute(): string
    {
        return Carbon::parse($this->time)->format('H:i');
    }

    public function getEndTimeAttribute(): string
    {
        $startTime = Carbon::parse($this->time);
        $endTime = $startTime->addMinutes($this->duration);
        return $endTime->format('H:i');
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING => 'badge-warning',
            self::STATUS_CONFIRMED => 'badge-info',
            self::STATUS_COMPLETED => 'badge-success',
            self::STATUS_CANCELLED => 'badge-danger',
            default => 'badge-secondary'
        };
    }

    public function getIsPastAttribute(): bool
    {
        $bookingDateTime = Carbon::parse($this->date->format('Y-m-d') . ' ' . $this->time);
        return $bookingDateTime->isPast();
    }

    public function getIsUpcomingAttribute(): bool
    {
        $bookingDateTime = Carbon::parse($this->date->format('Y-m-d') . ' ' . $this->time);
        return $bookingDateTime->isFuture();
    }

    public function getIsTodayAttribute(): bool
    {
        return $this->date->isToday();
    }

    // Scope methods
    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeConfirmed(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_CONFIRMED);
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    public function scopeCancelled(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }

    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('date', today());
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('date', '>=', today());
    }

    public function scopePast(Builder $query): Builder
    {
        return $query->where('date', '<', today());
    }

    public function scopeByConsultan(Builder $query, int $consultanId): Builder
    {
        return $query->where('consultan_id', $consultanId);
    }

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    public function scopeByDateRange(Builder $query, string $startDate, string $endDate): Builder
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    public function scopeFreeTrial(Builder $query): Builder
    {
        return $query->whereNotNull('free_trial_id');
    }

    public function scopePaid(Builder $query): Builder
    {
        return $query->whereNull('free_trial_id');
    }

    // Helper methods
    public function isFreeTrial(): bool
    {
        return !is_null($this->free_trial_id);
    }

    public function isPaid(): bool
    {
        return is_null($this->free_trial_id);
    }

    public function canBeCancelled(): bool
    {
        return in_array($this->status, [self::STATUS_PENDING, self::STATUS_CONFIRMED])
            && $this->isUpcoming;
    }

    public function canBeRescheduled(): bool
    {
        return in_array($this->status, [self::STATUS_PENDING, self::STATUS_CONFIRMED])
            && $this->isUpcoming;
    }

    public function markAsConfirmed(): bool
    {
        return $this->update(['status' => self::STATUS_CONFIRMED]);
    }

    public function markAsCompleted(): bool
    {
        return $this->update(['status' => self::STATUS_COMPLETED]);
    }

    public function markAsCancelled(): bool
    {
        return $this->update(['status' => self::STATUS_CANCELLED]);
    }

    public function generateMeetingLink(): string
    {
        // You can integrate with Zoom, Google Meet, or other services
        // For now, returning a placeholder
        return 'https://meet.example.com/booking-' . $this->id;
    }

    // Static methods for getting available options
    public static function getStatusOptions(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_CONFIRMED => 'Confirmed',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled',
        ];
    }

    public static function getTypeOptions(): array
    {
        return [
            self::TYPE_ONLINE => 'Online',
            self::TYPE_OFFLINE => 'Offline',
        ];
    }
}
