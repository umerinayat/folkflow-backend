<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ICompany;

use App\Models\Company;

class CompanyRepository extends BaseRepository implements ICompany
{
    public function model()
    {
        return Company::class;
    }
}