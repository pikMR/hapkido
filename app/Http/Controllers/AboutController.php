<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Session;

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
        $message->from('benjahergar@gmail.com');
        $message->to('gomezcortesjesus@gmail.com', 'Admin')->subject('Correo KUMSANG');
    });
    return \Redirect::route('contact')
      ->with('message', 'Gracias por todo!!');
  }
public function registrar(CreateUserRequest $request){
          
            $user = User::create($request->all());
            UserProfile::create(['user_id'=>$user->id]);
            Session::put('store_message', "- Activación de la cuenta en proceso -");
            return redirect()->back();  
        }
}
