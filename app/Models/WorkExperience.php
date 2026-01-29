<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'company_name',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'description',
    ];

    public $timestamps = true;

    // Relationships
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    // Helpers
    public function getDurationAttribute()
    {
        $months = ($this->end_year - $this->start_year) * 12 + ($this->end_month - $this->start_month);
        $years = floor($months / 12);
        $remainingMonths = $months % 12;

        if ($years > 0 && $remainingMonths > 0) {
            return "{$years} tahun {$remainingMonths} bulan";
        } elseif ($years > 0) {
            return "{$years} tahun";
        } else {
            return "{$remainingMonths} bulan";
        }
    }
}
