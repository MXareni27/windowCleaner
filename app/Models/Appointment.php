<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direction;
use App\Models\AppointmentDetail;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;
    protected $table ='appointments';
    protected $fillable=[
        'day',
        'status',
        'idUser'
    ];

    public function alldirection(){
        //$des = AdDescription::find($this->idAd);
        //return $des->description;
        return Direction::where('idAppointments', $this->id)->get()->first();
    }

    public function servicesApp(){
        //$des = AdDescription::find($this->idAd);
        //return $des->description;
        return AppointmentDetail::where('idAppointments', $this->id)->get();
    }

    public function username(){
        //$des = AdDescription::find($this->idAd);
        //return $des->description;
        return User::where('id', $this->idUser)->get()->first();
    }

}
