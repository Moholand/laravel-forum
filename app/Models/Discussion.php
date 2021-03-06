<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reply;
use App\Models\Channel;
use App\Notifications\ReplyMarkAsBest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function channel() {
        return $this->belongsTo(Channel::class);
    }

    public function getRouteKeyName() 
    {
        return 'slug';
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function scopeFilterByChannel($builder)
    {
        if(request()->query('channel')) {
            $channel = Channel::where('slug', request()->query('channel'))->first();

            if($channel) {
                return $builder->where('channel_id', $channel->id);
            }

            return $builder;
        }

        return $builder;
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id,
        ]);

        $reply->owner->points += 50;
        $reply->owner->save();

        if($reply->owner->id === $this->author->id) {
            return;
        }

        $reply->owner->notify(new ReplyMarkAsBest($reply->discussion));
    }
}
