<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function __construct(private User $model)
    {

    }

    public function getUser(array $attributes, $firstOrCreate = false)
    {
        if ($firstOrCreate) {
            return $this->model->firstOrCreate($attributes);
        }

        return $this->model->where($attributes)->first();
    }
}
