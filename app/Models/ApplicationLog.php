<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationLog extends Model
{
    use HasFactory;

    protected $table = 'application_logs';

    protected $fillable = [
        'application_id',
        'old_status',
        'new_status',
        'changed_by',
    ];

    public $timestamps = true;

    // Relationships
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function changedByUser()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
