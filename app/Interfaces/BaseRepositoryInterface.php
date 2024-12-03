<?php

namespace App\Interfaces;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Filter;
interface BaseRepositoryInterface
{
    public function all(array $queryfilter);

    public function update(array $data,Model $model);

    public function delete(Model $model);

    public function show(Model $model);
}
