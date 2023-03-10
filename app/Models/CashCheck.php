<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashCheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_key',
        'number',
        'amount',
        'is_posted'
    ];
}
