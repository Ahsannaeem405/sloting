<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //php artisan make:migration add_image_to_link_table --table=link

    protected $fillable = [
        'name',
        'link',
       
    ];
    use HasFactory;
}
