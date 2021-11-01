<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner', 'holder_name', 'account_number', 'iban', 'cvv', 'expiration', 'bank_name','balance'
    ];
}
