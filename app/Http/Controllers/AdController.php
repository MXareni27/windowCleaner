<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\AdDescription;
use Illuminate\Support\Facades\File;

class AdController extends Controller
{
    public function show(){
        $ad = Ad::all();
       // dd($ad);
        return view('home')
                    ->with('ads',$ad);
    }

    public function showAdmi(){
        $ad = Ad::all();
       // dd($ad);
        return view('admiService')
                    ->with('ads',$ad);
    }

    public function add(Request $request) 
    {  
        
        $p = new Ad();
        $p->name = $request->name;
        $imagen = $request->file('img');
        $nombre = time().'.'.$imagen->getClientOriginalExtension();
        $destination = public_path('img/services');
        $request->img->move($destination, $nombre);
        $p->img = $nombre;
       
        $p->save(); 
        $i = 1;
        while ($request->input('description'. $i)){
            
                $adDes= new AdDescription();
                $adDes->idAd = $p->id;
                $adDes->description = $request->input('description'. $i);
                $adDes->save();
                $i++;
        }
         
        /*

        if($request->description + $i){
          $p->save();
        }*/

        return redirect("/homeAdmi");
     }  

     public function showEdit(Request $request ) 
      {  
         $p=Ad::find($request->adIDEdit);
         return view("editService")->with('ad',$p);
      } 

      public function update(Request $request ) 
      {  
        $p = Ad::find($request->id);
        $p->name = $request->name;
        $p->save();
        
        return redirect("/admiService");
      } 

      public function delete(Request $request ) 
      {  
        $p=Ad::find($request->adID);
        $destination = "img/services/".$p->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        //Storage::disk('app/public/img/services')->delete($p -> img);
        $p->delete();
        return redirect("/admiService");
       } 

       public function downloadServicesPDF() 
      {  
        $services = Ad::all();
        $description = AdDescription::all();
        view()->share('servicePDF', [$services, $description]);
        $pdf = PDF::loadView('servicePDF',['services' => $services, 'description'=>$description]);
        return $pdf->download('Servicios disponibles');
       } 
}
