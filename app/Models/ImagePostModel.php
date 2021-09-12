<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePostModel extends Model
{
    use HasFactory;

    protected $table = 'omis_image_post';
    protected $fillable = [
        'post_id',
        'image_name',
    ];
}
