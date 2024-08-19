<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_us extends Model
{
    use HasFactory;

    // Explicitly define the table name if it's not the plural form of the model name
    protected $table = 'contact_us';

    // Disable timestamps if your table does not have created_at and updated_at columns
    public $timestamps = false;

    // Specify the primary key field
    protected $primaryKey = 'contact_us_id';

    // If your primary key is not an incrementing integer, specify its type
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'con_name',
        'con_email',
        'con_phone',
        'con_subject',
        'con_message',
        'created_at',
    ];
}
