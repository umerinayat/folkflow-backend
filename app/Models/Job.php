<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id',

        'title',
        'internal_job_code',
        'tags',
        'employment_type',
        'experience',
        'education',
        'keywords',

        'salary_from',
        'salary_to',
        'salary_currency',

        'equity_from',
        'equity_to',

        'country',
        'city',
        'isRemote',

        'company_industry',
        'function',

        'role_overview',
        'responsibilties',
        'requirements',
        'benefits',
        
    ];

    public function company() 
    {
        return $this->belongsTo(Company::class);
    }
}
