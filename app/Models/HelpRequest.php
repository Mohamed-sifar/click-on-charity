<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    use HasFactory;

    protected $table = 'help_requests';
    protected $primaryKey = 'help_request_id';
    public $timestamps = false;

    protected $fillable = [
        'full_name', 'email', 'phone', 'nic', 'address',
        'help_type', 'description', 'urgency',
        'supporting_documents', 'status'
    ];

    protected $casts = [
        'supporting_documents' => 'array',
    ];
}

