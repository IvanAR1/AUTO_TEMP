<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'arduino_key'
    ];

    public function channel()
    {
        return $this->hasOne(UserChannel::class);
    }
}
