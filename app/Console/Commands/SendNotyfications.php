<?php

namespace App\Console\Commands;

use App\Jobs\SendNewPostNotification;
use App\Models\Post;
use Illuminate\Console\Command;

class SendNotyfications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send not sent information about posts';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::all();

        $bar = $this->output->createProgressBar(count($posts));

        $bar->start();

        foreach ($posts as $post) {
            SendNewPostNotification::dispatch($post);

            $bar->advance();
        }

        $bar->finish();
    }
}
