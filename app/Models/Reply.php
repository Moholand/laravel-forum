<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function is_liked_by_auth_user() {
        $id = isset(auth()->user()->id) ? auth()->user()->id : null;

        $likers = [];

        foreach($this->likes as $like):
            array_push($likers, $like->user_id);
        endforeach;

        if(in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
