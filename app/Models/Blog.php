<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Explicitly define the table name if it's not the plural form of the model name
    protected $table = 'blogs';

    // Disable timestamps if your table does not have created_at and updated_at columns
    public $timestamps = false;

    // Specify the primary key field
    protected $primaryKey = 'blog_id';

    // If your primary key is not an incrementing integer, specify its type
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'title',
        'content',
        'image',
        'created_by',
        'created_dte',
    ];
}
