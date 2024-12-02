<?php

namespace App\Interfaces;
use Illuminate\Database\Eloquent\Model;
interface BaseRepositoryInterface
{
    public function all();

    public function update(array $data,Model $model);

    public function delete(Model $model);

    public function show(Model $model);
}
