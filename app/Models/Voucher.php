<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'description',
        'min_spend',
        'max_discount',
        'end_date',
        'is_active',
        'used_count',
    ];

    protected $casts = [
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];
}
