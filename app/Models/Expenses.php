<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'description',
        'user_id',
        'photo',
        'expense_date',
    ];

    protected $dates = [
        'expense_date',
    ];

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value)
    {
        return $this->attributes['amount'] = $value / 100;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
