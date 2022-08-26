<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'website_id'];


    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }

    public function sent_notifications()
    {
       return $this->belongsToMany(Subscriber::class, 'sent_notifications', 'post_id', 'subscriber_id');
    }
}
