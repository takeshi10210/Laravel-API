<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
	protected $fillable = [
    'ar_id',
    're_name',
    're_text'
    ];
    protected $primaryKey = 're_id';
}
