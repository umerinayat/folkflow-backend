<?php

namespace App\Repositories\Eloquent;

use App\Models\Job;
use App\Repositories\Contracts\IJob;


class JobRepository extends BaseRepository implements IJob
{
    public function model()
    {
        return Job::class;
    }

    public function applyTags($id, array $data)
    {
        $job = $this->model->find($id);
        // TODO apply tag
    }
}