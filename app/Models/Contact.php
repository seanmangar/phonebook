<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contact extends Model
{
    use HasFactory, Searchable;

    public $fillable = [
        'first_name',
        'last_name',
        'phone_num'
    ];
}
