<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topshiriq extends Model
{
    /** @use HasFactory<\Database\Factories\TopshiriqFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'ijrochi',
        'title',
        'description',
        'file',
        'muddat',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hududtopshriq()
    {
        return $this->hasMany(HududTopshiriq::class);
    }
}
