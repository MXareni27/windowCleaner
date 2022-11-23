<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Appointment;
use App\Models\AppointmentDetail;
use App\Models\Direction;
use App\Models\Time;
use App\Models\Day;

use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function showServices(){
        $ad = Ad::all();
       // dd($ad);
        return view('addAppointment')
                    ->with('ads',$ad);
    }

    public function showAppoinments(){
        $app = Appointment::all();
       // dd($ad);
        return view('admiAppointment')
                    ->with('app',$app);
    }

    public function viewAppoinments(){
        $id = Auth::id();
        $app = Appointment::where('idUser',$id)->get();
        
       // dd($ad);
        return view('viewAppointment')
                    ->with('app',$app);
    }

    public function ca(){
        $app = Appointment::all();
       // dd($ad);
        return view('calendar')
        ->with('app',$app);
    }

    public function caid($id)
    {
        $app = Appointment::find($id);
        return view('appDetails')
        ->with('app',$app);
    }

    public function showAppoinment($id)
    {
        $app = Appointment::find($id);
        $ad = Ad::all();
        return view('showAppointment')
        ->with('app',$app)
        ->with('ads',$ad);;
    }

    public function addapp(Request $request) 
    {       
        $id = Auth::id();
       // dd($id);
        $p = new Appointment();
        
        $p->idUser = $id;
        //$p->hour = "04:18:27";
        $p->day = $request->dateApp;
        
        $p->status = "Aceptada";
        $p->save();
        //$day = new Day();
        //$day->day = $request->dateApp;
        //$day->save();
        //$time = new Time();
        //$time->day = $request->dateApp;
        //$time->idAppointments = $p->id;
        //$time->save();
        $ads = Ad::all();
        foreach ($ads as $ad) {
            if(isset($_POST["service".$ad->id])){
                $new_detail = new AppointmentDetail();
                $new_detail->idAppointments = $p->id;
                $new_detail->serviceID = $ad->id;
                $new_detail->service = $ad->name;
                $new_detail->save();
            }
        }
        $d = new Direction();
        $d->idAppointments = $p->id;
        $d->city = $request->city;
        $d->street = $request->street;
        $d->number = $request->num;
        $d->cp = $request->cp;
        $d ->colony = $request->colony;
        $d -> phoneNumber =$request->tel;
        $d->save();

         
        
        return redirect("/home");
     }  

     public function updateStatus(Request $request ) 
      {  
        $app = Appointment::find($request->id);
       // dd($app);
        $app->status = $request->selectStatus;
        $app->save();
        
        return redirect("/calendar");
      } 

      public function editapp(Request $request) 
    {       
       
        $p = Appointment::find($request->id);
        
        //$p->hour = "04:18:27";
        $p->day = $request->dateApp;
        
       // $p->status = $request->selectStatus;
        $p->save();
        //$day = new Day();
        //$day->day = $request->dateApp;
        //$day->save();
        //$time = new Time();
        //$time->day = $request->dateApp;
        //$time->idAppointments = $p->id;
        //$time->save();
        
        foreach($p->servicesApp() as $services){
            $services->delete();
        }
        $ads = Ad::all();
        foreach ($ads as $ad) {
            if(isset($_POST["service".$ad->id])){
                $new_detail = new AppointmentDetail();
                $new_detail->idAppointments = $p->id;
                $new_detail->serviceID = $ad->id;
                $new_detail->service = $ad->name;
                $new_detail->save();
            }
        }
        $d = Direction::where('idAppointments',$p->id)->get()->first();
        $d->city = $request->city;
        $d->street = $request->street;
        $d->number = $request->num;
        $d->cp = $request->cp;
        $d->colony = $request->colony;
        $d->phoneNumber = $request->tel;
        $d->save();

         
        
        return redirect("/home");
     }  
}
