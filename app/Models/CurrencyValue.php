<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'currency_id',
        'currency_value',
        'logged_at',
    ];
    protected $keyType = 'string';
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
