<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_main extends Model
{
    use HasFactory;

    // Explicitly define the table name if it's not the plural form of the model name
    protected $table = 'contact_main';

    // Disable timestamps if your table does not have created_at and updated_at columns
    public $timestamps = false;

    // Specify the primary key field
    protected $primaryKey = 'contact_main_id';

    // If your primary key is not an incrementing integer, specify its type
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'contact_title',
        'contact_main_content',
        'contact_image_1',
        'contact_image_2',
        'contact_image_3',
        'contact_image_4',
    ];
}
