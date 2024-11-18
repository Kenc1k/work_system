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


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
