<?php

namespace App\Repositories;


use App\Models\Website;
use Illuminate\Database\Eloquent\Collection;

class WebsiteRepository {

    private Website $model;

    public function __construct(Website $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    public function getWebsite(array $attributes)
    {
      return  $this->model->where($attributes)->first();
    }


}
