<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'user_id'];

    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'website_subscribers', 'subscriber_id', 'website_id');
    }


}
