<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'omis_posts';
    protected $fillable = [
        'user_id',
        'title',
        'event_date',
        'descriptions',
    ];
}
