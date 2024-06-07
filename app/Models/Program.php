<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'details', 'is_upcoming',];

    public function images()
    {
        return $this->hasMany(ProgramImage::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
