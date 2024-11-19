<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HududTopshiriq extends Model
{
    use HasFactory;

    protected $fillable = [
        'hudud_id',
        'topshiriq_id',
        'status',
    ];

    public function hudud()
    {
        return $this->belongsTo(Hudud::class);
    }

    public function topshiriq()
    {
        return $this->belongsTo(Topshiriq::class);
    }
}
