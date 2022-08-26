<?php

namespace App\Actions\Subscription;

use Exception;

class WebsiteSubscriber
{
    /**
     * @param $website
     * @param $subscriber
     * @return bool
     */
    public function subscribe($website, $subscriber): bool
    {
        if(!$website->subscribers->pluck('id')->contains($subscriber->id)){
            $website->subscribers()->attach($subscriber);

            return true;
        }

        return false;

    }

    public function unsubscribe($website, $subscriber)
    {
        $website->subscribers()->detach($subscriber);
    }
}
