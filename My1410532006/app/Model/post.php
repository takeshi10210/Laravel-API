<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
    'ar_sort',
    'ar_name',
    'ar_text'
    ];
    protected $primaryKey = 'ar_id';
}
