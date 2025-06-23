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
        'consultant_id',
        'free_trial_id',
        'full_name',
        'email',
        'phone',
        'booking_date',
        'booking_time',
        'duration',
        'type',
        'status',
        'topic',
        'notes',
        'amount',
        'meeting_link',
        'rating',
        'feedback'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'amount' => 'decimal:2',
        'rating' => 'integer'
    ];

    // Constants for booking status
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    // Constants for booking type
    const TYPE_PAID = 'paid';
    const TYPE_FREE = 'free';

    // Relationships

    public function decrementFreeTrialSlots(): void
{
    if ($this->free_trial_id && $this->freeTrial) {
        $this->freeTrial->decrementUsedSlots();
    }
}
    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }

    public function freeTrial(): BelongsTo
    {
        return $this->belongsTo(FreeTrial::class);
    }

    // Accessor methods
    public function getFullDateTimeAttribute(): string
    {
        return $this->booking_date->format('Y-m-d') . ' ' . $this->booking_time;
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->booking_date->format('d M Y');
    }

    public function getFormattedTimeAttribute(): string
    {
        return Carbon::parse($this->booking_time)->format('H:i');
    }

    public function getEndTimeAttribute(): string
    {
        $startTime = Carbon::parse($this->booking_time);
        $endTime = $startTime->addMinutes($this->duration ?? 60);
        return $endTime->format('H:i');
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING => 'bg-warning text-dark',
            self::STATUS_CONFIRMED => 'bg-info text-white',
            self::STATUS_COMPLETED => 'bg-success text-white',
            self::STATUS_CANCELLED => 'bg-danger text-white',
            default => 'bg-secondary text-white'
        };
    }

    public function getStatusTextAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING => 'Menunggu',
            self::STATUS_CONFIRMED => 'Dikonfirmasi',
            self::STATUS_COMPLETED => 'Selesai',
            self::STATUS_CANCELLED => 'Dibatalkan',
            default => 'Tidak Diketahui'
        };
    }

    public function getTypeTextAttribute(): string
    {
        return match($this->type) {
            self::TYPE_PAID => 'Berbayar',
            self::TYPE_FREE => 'Gratis',
            default => 'Tidak Diketahui'
        };
    }

    public function getIsPastAttribute(): bool
    {
        $bookingDateTime = Carbon::parse($this->booking_date->format('Y-m-d') . ' ' . $this->booking_time);
        return $bookingDateTime->isPast();
    }

    public function getIsUpcomingAttribute(): bool
    {
        $bookingDateTime = Carbon::parse($this->booking_date->format('Y-m-d') . ' ' . $this->booking_time);
        return $bookingDateTime->isFuture();
    }

    public function getIsTodayAttribute(): bool
    {
        return $this->booking_date->isToday();
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
        return $query->whereDate('booking_date', today());
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('booking_date', '>=', today());
    }

    public function scopePast(Builder $query): Builder
    {
        return $query->where('booking_date', '<', today());
    }

    public function scopeByConsultan(Builder $query, int $consultanId): Builder
    {
        return $query->where('consultant_id', $consultanId);
    }

    public function scopeByDateRange(Builder $query, string $startDate, string $endDate): Builder
    {
        return $query->whereBetween('booking_date', [$startDate, $endDate]);
    }

    public function scopeFreeTrial(Builder $query): Builder
    {
        return $query->whereNotNull('free_trial_id');
    }

    public function scopePaid(Builder $query): Builder
    {
        return $query->whereNull('free_trial_id');
    }

    public function scopeFreeType(Builder $query): Builder
    {
        return $query->where('type', self::TYPE_FREE);
    }

    public function scopePaidType(Builder $query): Builder
    {
        return $query->where('type', self::TYPE_PAID);
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

    public function isFreeType(): bool
    {
        return $this->type === self::TYPE_FREE;
    }

    public function isPaidType(): bool
    {
        return $this->type === self::TYPE_PAID;
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
        // Generate unique meeting link
        return 'https://meet.example.com/' . $this->id . '-' . md5($this->email . $this->booking_date);
    }

    // Static methods
    public static function getStatusOptions(): array
    {
        return [
            self::STATUS_PENDING => 'Menunggu',
            self::STATUS_CONFIRMED => 'Dikonfirmasi',
            self::STATUS_COMPLETED => 'Selesai',
            self::STATUS_CANCELLED => 'Dibatalkan',
        ];
    }

    public static function getTypeOptions(): array
    {
        return [
            self::TYPE_PAID => 'Berbayar',
            self::TYPE_FREE => 'Gratis',
        ];
    }
}
