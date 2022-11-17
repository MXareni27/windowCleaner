<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdDescription;

class Ad extends Model
{
    use HasFactory;
    protected $table ='ads';
    protected $fillable=[
        'img',
        'name'
    ];

    public function nameService(){
        //$des = AdDescription::find($this->idAd);
        //return $des->description;
        return AdDescription::where('idAd', $this->id)->get();
    }
}



