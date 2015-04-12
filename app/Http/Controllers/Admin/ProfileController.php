<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Session;
//use App\Http\Controllers\Admin\Mail;
/**
 * Si no usamos php artisan make:ProfileController --plane , y lo hacemos sin --plane nos generara una plantilla
 * si escribimos php artisan route:list podremos ver las especificaciones de las rutas.
 */
class ProfileController extends Controller {

	protected $request;
        protected $user;
        
        public function __construct(Guard $auth,Request $request) {
            $this->auth = $auth;
            $this->middleware('is_admin');
            $this->middleware('auth');
            
            //$this->middleware('auth');
            $this->request = $request; // uso dinamico con constructor.
        }
        
        
        private function noContributor(){
              // return ($this->auth->user()->type!='editor'&&$this->auth->user()->type!='contributor' );
            return false;
        }
        
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{        
            $usuario = $this->auth->user();
            $data = ProfileController::getUnion($usuario);
            //$data = $usuario->profile; de esta forma puedo obtener el perfil sin usuario, llamando al metodo profile();
            return view('admin.home.myprofile',array('profile'=>$data));
	}

           
        private function getUnion($user){
            $data = User::select('users.*')
                    -> with('profile') // accedemos al metodo profile de User
                    ->where('id','=',$user->id)
                    //->orderBy
                    ->first(); // get() para todos.
           //dd($data->profile);
            return $data;
        }
        
        /**
         * Función que mostrara la vista help, y que usara el metodo store para realizar preguntas.
         * @return type
         */
        public function help()
	{
            return view('admin.home.help');
	}
        
        public function appeals()
        {
            if(ProfileController::noContributor()) return redirect()->back();
            $data = \DB::table('users')
                    ->select(
                            'users.id','users.email','users.full_name','user_profiles.id as profile_id',
                            'user_profiles.bio'
                     )
                    ->whereNOTNull('bio')
                    ->where('bio','<>','')
                    ->join('user_profiles','users.id','=','user_profiles.user_id')
                    ->get();
                    
                //    dd($data);
                    
                    /*User::select('users.*','user_profiles.bio','user_profiles.user_id as pid')
                    ->whereNOTNull('bio')
                    ->get(); // get() para todos.
            dd($data->toArray());*/
            return view('admin.home.appeals',['respuestas'=>$data]);
        }
        
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request){
            //dd($request->id);
           // dd($request->only('id'));
	}
        
        public function appremove(EditProfileRequest $request){
            if(ProfileController::noContributor()) return redirect()->back();
            $nombre = $request->only('name');
            $id = $request->only('id');
            $email = $request->only('email');
            $respuesta = $request->only('respuesta');
            //dd($nombre,$id,$email,$respuesta);
            
            //dd($data);
            $profile=UserProfile::where('id', '=',$id)->firstOrFail();
            //dd($profile->bio);
            $data = ['name'=>$nombre,'email'=>$email,'respuesta'=>$respuesta,'oldbio'=>$profile->bio,'writer'=>$this->auth->user()->full_name,'writer_email'=>$this->auth->user()->email];
            // Envio de correo
           \Mail::send('admin.home.email', $data, function($message)
            {
                $message->from('gomezcortesjesus@gmail.com', 'HAPKIDOMURCIA.ES');
                $message->to('benjahergar@gmail.com')->cc('zovbenja@hotmail.com');
                $message->subject('Respuesta a pregunta/cuestión planteada en Socios');
            });
           /* \Mail::send('emails.contact',
               array(
                   'name' => $nombre,
                   'email' => $email,
                   'user_message' => $respuesta
               ), function($message)
           {
               $message->from('benjahergar@gmail.com');
               $message->to('gomezcortesjesus@gmail.com', 'Admin')->subject('Correo KUMSANG');
           }); */
           // seguimos
            $profile->fill($request->all());
             $profile->save();
           return redirect()->back(); 
	}
	/**
         * 
	 * Store a newly created resource in storage.
	 * Lo utilizamos para realizar las preguntas de /help
	 * @return Response
	 */
	public function store(EditProfileRequest $request)
	{       
                 $usuario = $this->auth->user();
                 $profile=UserProfile::where('user_id', '=',$usuario->id)->firstOrFail();
                 $profile->fill($request->only('bio'));
                 $profile->save();
                 Session::put('bio_message', "- Se ha enviado la pregunta correctamente, en breve recibirás respuesta. -");
                 return view('admin.home.help');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
                /*return 'b';
                 * Carga de datos.. 
                 * $user = User::findOrFail($id);
                   $data = ProfileController::getUnion($user); etc
                 
            
            // y envio a vista..
            $data=null;
            return view('admin.home.help',array('respuestas'=>$data));*/
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $user = User::findOrFail($id);
            $data = ProfileController::getUnion($user);
            return view('admin.home.myprofile',array('profile'=>$data));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
         * ,EditProfileRequest $requestprofile ,
	 */
	public function update(EditUserRequest $request, $id)
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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
