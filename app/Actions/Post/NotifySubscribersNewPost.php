<?php

namespace App\Actions\Post;

use App\Jobs\SendNewPostNotification;
use App\Models\Post;


class NotifySubscribersNewPost
{
  public function __construct(public Post $post)
  {

  }

  public function notify()
  {
     SendNewPostNotification::dispatch($this->post);
  }
}
