<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentoring extends Model
{
    use HasFactory;
    
    protected $table = 'mentoring';

    protected $fillable = [
        'title', 
        'image', 
        'description', 
        'price_normal', 
        'price_discount',
        'slug'
    ];



    // Alias untuk backward compatibility jika ada kode lain yang menggunakan descriptionData
    public function mentoringDescription()
    {
        return $this->hasOne(MentoringDescription::class, 'mentoring_id');
    }


    // ==================== ACCESSOR ====================
    public function getFormattedNormalPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_normal, 0, ',', '.');
    }

    public function getFormattedDiscountPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_discount, 0, ',', '.');
    }

    public function getHasDiscountAttribute()
    {
        return $this->price_discount < $this->price_normal;
    }

    public function getChaptersAttribute()
    {
        if (!$this->description) return [];
        return array_filter(explode("\n", $this->description));
    }
}