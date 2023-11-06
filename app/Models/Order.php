<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDING = 0;
    const CONFIRMED = 1;
    const PROGRESS = 2;
    const DELIVERED = 3;
    const CANCELLED = 4;

    protected $fillable = [
        'status', 'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
