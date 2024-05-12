<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /** @var array<string>*/
    protected $fillable = [
        'payer_id',
        'payee_id',
        'amount',
        'status'
    ];
}