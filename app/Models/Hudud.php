<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Metadata\Uses;

class Hudud extends Model
{
    /** @use HasFactory<\Database\Factories\HududFactory> */
    use HasFactory;

    protected $fillable = ['user_id' , 'name'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hududtopshiriq()
    {
        return $this->hasMany(HududTopshiriq::class);
    }

}
