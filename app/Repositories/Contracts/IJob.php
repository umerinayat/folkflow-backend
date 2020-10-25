<?php

namespace App\Repositories\Contracts;

interface IJob
{
    public function applyTags($id, array $data);
}