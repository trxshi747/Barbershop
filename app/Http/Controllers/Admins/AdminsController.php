<?php


namespace App\Http\Controllers\Admins;



use App\Http\Controllers\Controller;
use App\Models\Pack\Pack;
use App\Models\Service\Service;
use app\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect;
use File;
use App\Models\Coiffeur;
use App\Models\Booking\Booking;
use App\Models\Disponibilite;

class AdminsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $ServicesCount = Service::select()->count();
        $adminsCount = Admin::select()->count();
        $CoiffeursCount = Coiffeur::select()->count();
        $bookingsCount = Booking::select()->count();


        return view('admins.index',compact('ServicesCount', 'adminsCount','CoiffeursCount','bookingsCount'));
     
    
        
    }






    public function displayAllAmins(){

          $alladmins = Admin ::select()->orderby('id','desc')->get();
          return view ('admins.alladmins', compact('alladmins'));

    }
     
    public function createAdmins() {

       
        return view('admins.createbarbers');

    }
    public function  storeAdmins(Request $request) {
           
         Request()->validate([
            "name" => "required|max:40",
            "email" => "required|max:40",
            "password" => "required|max:40",
            
        ]);

        $storeAmins = Admin::Create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if($storeAmins) {
            return Redirect::route('all.admins')->with( ['success' => "admin created successffully"] );
        }
    }
    public function  DeleteAdmin($id) {

        $Admins = Admin::find($id);
        
          $Admins -> delete();
    
    
         
            return Redirect::route('all.admins')->with( ['delete' => "The admin has been removed with succès"] );
        
    
    }


    public function ModifieraAdmins($id) {
        $admin = Admin::findOrFail($id);
        return view('admins.adminsedit', compact('admin'));
    }
    
    public function UpdateAdmins(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            // Ajoutez d'autres champs si nécessaire
        ]);
    
        $admin = Admin::findOrFail($id);
        $admin->update($validated);
    
        return redirect()->route('all.admins')
                        ->with('success', 'update Admin with succes');
    }
    public function displayServices() {

        $Services = Service::select()->orderBy('id', 'asc')->get();


        return view('admins.allServices', compact('Services'));


    }
    public function  CreateServices() {

        

        return view('admins.CreateServices');


    }



    public function  StoreServices(Request $request) {
           
       // Request()->validate([
            //"name"=> "required|max:40",
          // "description"=> "required|max:40",
           //"image"=> "required|max:40",
           //"price"=> "required|max:40",
           //"section"=> "required|max:40",
           //"duration"=> "required|max:40",
           
       //]);

       $destinationPath = 'assets/images/';
       $imageName = time().'.'.$request->image->extension(); // Génère un nom unique
       
       // Déplace le fichier uploadé
       $request->image->move(public_path($destinationPath), $imageName);
       
       $StoreServices = Service::Create([
           "name" => $request->name,
           "price" => $request->price,
           "description" => $request->description, 
           "image" => $imageName, // Stocke le chemin relatif
           "section" => $request->section,
           "duration" => $request->duration,
       ]);
       if($StoreServices) {
           return Redirect::route('all.Services')->with( ['success' => "service created succesffully"] );
       }
       else{
        return view("admins.index");
       }
   }
   

   public function  DeleteServices($id) {

    $Services = Service::find($id);
    if(File::exists(public_path('assets/images/' . $Services->image))){
        File::delete(public_path('assets/images/' . $Services->image));
    }else{
        //dd('File does not exists.');
    }
      $Services -> delete();


      if($Services) {
        return Redirect::route('all.Services')->with( ['delete' => "service deleted succesffully"] );
    }

}

public function  ModifierServices($id) {
    $Services = Service::find($id);
        

    return view('admins.ModifierServices', compact('Services'));




}

public function UpdateServices(Request $request, $id) {

    $Services = Service::find($id);

    
    $destinationPath = 'assets/images/';
    if ($Services->image && file_exists(public_path($destinationPath.$Services->image))) {
        unlink(public_path($destinationPath.$Services->image));
    }
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path($destinationPath), $imageName);
    $Services->update([
        "name" => $request->name,
        "price" => $request->price,
        "description" => $request->description, 
        "image" => $imageName,
        "section" => $request->section,
        "duration" => $request->duration,
    ]);


    if($Services) {

        return Redirect::route('all.Services')->with( ['update' => "Service updated succesffully"] );

    }


}

public function displayCoiffeur(){

    $Coiffeurs = Coiffeur ::select()->orderby('id','desc')->get();
    return view ('admins.coiffeurs.lescoiffeurs', compact('Coiffeurs'));

}
public function CreerCoiffeur()
{
    return view('admins.coiffeurs.createcoiffeurs');
}
public function StoreCoiffeur(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:Coiffeurs',
        'password' => 'required|string|min:8|confirmed',
        'telephone' => 'nullable|string|max:20',
        'adresse' => 'nullable|string',
        'nom_utilisateur' => 'required|string|max:255',
        'specialite' => 'nullable|string',
    ]);
    $data = $request->except('password');
    $data['password'] = Hash::make($request->password);

    Coiffeur::create($data);

    return redirect()->route('admin.coiffeurs.index')->with('success', 'The Barber was created successfully');
}


public function  DeleteCoiffeur($id) {

    $Coiffeurs = Coiffeur::find($id);
    
      $Coiffeurs -> delete();


     
        return Redirect::route('admin.coiffeurs.index')->with( ['delete' => "The barber  successfully deleted"] );
    

}
public function  ModifierCoiffeurs($id) {
    $Coiffeurs = Coiffeur::findOrFail($id);
        

    return view('admins.coiffeurs.ModifierCoiffeurs', compact('Coiffeurs'));

}


    public function updateCoiffeurs(Request $request, $id)                   
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:coiffeurs,email,'.$id,
        'nom_utilisateur' => 'required|string|max:255',
        'adresse' => 'nullable|string',
        'specialite' => 'nullable|string',
        'telephone' => 'nullable|string|max:20'
        // autres règles de validation
    ]);

    $Coiffeurs = Coiffeur::findOrFail($id);
    $Coiffeurs->update($validated);

    return redirect()->route('admin.coiffeurs.index')
                    ->with('success', 'he Barber was updated successfully');

   

                } 



                public function displayRDV() {

                    $Services = Service::select()->orderBy('id', 'asc')->get();
            
            
                    return view('admins.allServices', compact('Services'));
            
            

                }
                public function displayPacks() {

                    $Packs = Pack::select()->orderBy('id', 'asc')->get();
            
            
                    return view('admins.allPacks', compact('Packs'));
            
            
                }
                public function  CreatePacks() {
            
                    
            
                    return view('admins.CreatePacks');
        
            
                }
                public function  StorePacks(Request $request) {
                   
                        // Request()->validate([
                             //"name"=> "required|max:40",
                           // "description"=> "required|max:40",
                            //"image"=> "required|max:40",
                            //"price"=> "required|max:40",
                            //"section"=> "required|max:40",
                            //"duration"=> "required|max:40",
                            
                        //]);
                 
                        $destinationPath = 'assets/images/';
                        $imageName = time().'.'.$request->image->extension(); // Génère un nom unique
                        
                        // Déplace le fichier uploadé
                        $request->image->move(public_path($destinationPath), $imageName);
                        
                        $StorePacks = Pack::Create([
                            "name" => $request->name,
                            "price" => $request->price,
                            "description" => $request->description, 
                            "image" => $imageName, // Stocke le chemin relatif
                            "duration" => $request->duration,
                        ]);
                        if($StorePacks) {
                            return Redirect::route('all.Packs')->with( ['success' => "Pack created succesffully"] );
                        }
                        else{
                         return view("admins.index");
                        }
                    }
                    public function  DeletePacks($id) {

                        $Packs = Pack::find($id);
                        if(File::exists(public_path('assets/images/' .  $Packs->image))){
                            File::delete(public_path('assets/images/' . $Packs->image));
                        }else{
                            //dd('File does not exists.');
                        }
                        $Packs-> delete();
                          if($Packs) {
                            return Redirect::route('all.Packs')->with( ['delete' => "Packs deleted succesffully"] );
                        }
                    
                    }
                    
                    public function  ModifierPacks($id) {
                        $Packs = Pack::find($id);
                            return view('admins.ModifierPacks', compact('Packs'));
                    
                    
        
                    }
                    
                    public function UpdatePacks(Request $request, $id) {
                    
                        $Packs = Pack::find($id);
                    
                        
                        $destinationPath = 'assets/images/';
                        if ($Packs->image && file_exists(public_path($destinationPath. $Packs->image))) {
                            unlink(public_path($destinationPath. $Packs->image));
                        }
                        $imageName = time().'.'.$request->image->extension();
                        $request->image->move(public_path($destinationPath), $imageName);
                        $Packs->update([
                            "name" => $request->name,
                            "price" => $request->price,
                            "description" => $request->description, 
                            "image" => $imageName,
                            "duration" => $request->duration,
                        ]);
                    
                    
                        if($Packs) {
                    
                            return Redirect::route('all.Packs')->with( ['update' => "Pack updated succesffully"] );
                    
                        }
                    
                    
                    }
                    public function displayBooking() {

                        $bookings = Booking::with(['user', 'services', 'payment'])
                         ->latest()
                         ->paginate(10);
                         
                
                        return view('admins.allBooking', compact('bookings'));
                
                
                    }
                    
            
             // Ajoutez ces méthodes dans la classe AdminsController

             
                

   

     
                
            
                
   
    
}
