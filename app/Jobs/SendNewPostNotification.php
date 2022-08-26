<?php

namespace App\Jobs;

use App\Actions\Post\NotifySubscribersNewPost;
use App\Mail\NewPostEmail;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewPostNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Post $post)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {



        $subscribers = Cache::remember('subscribers', 1000, function () {
            return Subscriber::whereHas('subscriptions', function($query) {
                $query->where('id', $this->post->website_id);
            })->whereDoesntHave('received_notifications', function($query){
                $query->where('id', $this->post->id);
            })->get();
        });



        foreach($subscribers as $subscriber)
        {
            Mail::to($subscriber->email)->send(new NewPostEmail($this->post, $subscriber));

            $this->post->sent_notifications()->attach($subscriber);
        }

    }
}
