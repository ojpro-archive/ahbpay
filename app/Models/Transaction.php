<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['serial', 'type', 'from_user', 'to_user', 'amount', 'validated'];

    public function by_user()
    {
        return $this->belongsTo(User::class, 'from_user', 'id');
    }
    public function for_user()
    {
        return $this->belongsTo(User::class, 'to_user', 'id');
    }
}
