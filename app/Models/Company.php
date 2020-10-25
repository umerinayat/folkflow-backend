<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 
        'industry', 
        'website', 
        'career_page_url',
        'brand_color',
        'logo',
        'thumbnail',
        'description',
        'phone',
        'type',
        
        'upload_successfull',
        'disk',
    ];

    public function user ()
    {
        return $this->hasOne(Company::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
