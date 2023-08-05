<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'currency_code',
        'long_name',
        'symbol',
        'created_by',
    ];
    protected $keyType = 'string';
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'created_by',
    ];
}
