<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditUserRequest;

class AboutController extends Controller {

    public function create(){
        return view('about.contact');
    }
    
    public function envio(){
        return view('auth.register');
    }
    
   public function store(ContactFormRequest $request)
  {
       \Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
    {
        $message->from('gomezcortesjesus@gmail.com');
        $message->to('admin@hapkidomurcia.es', 'Admin')->subject('Correo KUMSANG');
    });
    return \Redirect::route('/')
      ->with('message', 'Gracias por todo!!');
  }
public function registrar(CreateUserRequest $request){
          
            $user = User::create($request->all());
            UserProfile::create(['user_id'=>$user->id]);
            Session::put('store_message', "- Activación de la cuenta en proceso -");
            return redirect()->back();  
        }
        
        
    public function actualizar(EditUserRequest $request, $id)
	{       
                // primero busqueda
                $user = User::findOrFail($id);
                $profile=UserProfile::where('user_id', '=',$id)->firstOrFail();
                
                // segundo carga de datos
                $user->fill($request->all());
                $profile->fill($request->all());
                
                // tercero guardado.
                $user->save();
                $profile->save();
                // y redirección.
                return redirect()->back();
                
	}    
}
