<?php

namespace App\Repositories;

use App\Models\Subscriber;
use App\Models\User;

class SubscriberRepository
{

    public function __construct(private Subscriber $model)
    {

    }

    public function getSubscriber(array $attributes, $firstOrCreate = false)
    {
        if ($firstOrCreate) {
            return $this->model->firstOrCreate($attributes);
        }

        return $this->model->where($attributes)->first();
    }
}
