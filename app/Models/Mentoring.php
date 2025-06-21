<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentoring extends Model
{
    use HasFactory;
    
    protected $table = 'mentoring'; 

    protected $fillable = [
        'mentoring_description_id',
        'title',
        'image',
        'description',
        'price_normal',
        'price_discount',
        'slug'
    ];

    public function description()
    {
        return $this->belongsTo(MentoringDescription::class, 'mentoring_description_id');
    }

    // Accessors
    public function getFormattedNormalPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_normal, 0, ',', '.');
    }

    public function getFormattedDiscountPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_discount, 0, ',', '.');
    }
}


