<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    use HasFactory;

    public function channel()
    {
        return $this->hasOne(UserChannel::class);
    }
}
