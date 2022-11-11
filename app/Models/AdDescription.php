<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdDescription extends Model
{
    use HasFactory;
    protected $table ='ad_descriptions';
    protected $fillable=[
        'description',
        'idAd'
    ];
}
