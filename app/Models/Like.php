<?php

namespace App\Models;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    public function reply() {
        return $this->belongsTo(Reply::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
