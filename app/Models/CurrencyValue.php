<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyValue extends Model
{
    use HasFactory, SoftDeletes;
    protected $keyType = 'string';
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'logged_at',
        'currency_value',
        'currency_id',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

}
