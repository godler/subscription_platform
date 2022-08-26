<?php

namespace App\Actions\Website;

use App\Models\Website;

class WebsiteCreator
{
    public function __construct(protected Website $model)
    {

    }

    public function create(array $attributes)
    {
        $this->model->create($attributes);
    }

}
