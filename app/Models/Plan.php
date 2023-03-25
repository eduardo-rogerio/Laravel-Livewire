<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'slug',
        'reference',
        'description',
    ];
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
