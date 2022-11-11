<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDetail extends Model
{
    use HasFactory;
    protected $table ='appointment_details';
    protected $fillable=[
        'service',
        'idAppointments',
        'serviceID'

    ];
}
