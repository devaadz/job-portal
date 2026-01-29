<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'short_description',
        'cv_file',
        'cv_original',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'applicant_skills');
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
