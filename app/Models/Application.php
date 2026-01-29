<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'job_id',
        'status',
        'screening_result',
        'current_step',
    ];

    // Relationships
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function logs()
    {
        return $this->hasMany(ApplicationLog::class);
    }

    // Scopes
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByScreeningResult($query, $result)
    {
        return $query->where('screening_result', $result);
    }

    // Helpers
    public function getStatusLabelAttribute()
    {
        $labels = [
            'applied' => 'Melamar',
            'screening' => 'Screening',
            'interview' => 'Interview',
            'accepted' => 'Diterima',
            'rejected' => 'Ditolak',
        ];
        return $labels[$this->status] ?? $this->status;
    }

    public function getScreeningResultLabelAttribute()
    {
        $labels = [
            'match' => 'Cocok Semua',
            'partial' => 'Sebagian Cocok',
            'not_match' => 'Tidak Cocok',
        ];
        return $labels[$this->screening_result] ?? $this->screening_result;
    }
}
