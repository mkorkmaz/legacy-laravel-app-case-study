<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $hidden = [
        'created_at',
        'updated_at',

    ];
    protected $fillable = [
        'id',
        'long_name',
        'currency_code',
        'symbol',
        'created_by',
    ];
}
