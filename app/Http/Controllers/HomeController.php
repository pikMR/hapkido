<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Auth\Guard;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

      //  public function getOrm

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
    $this->auth = $auth;
		$this->middleware('auth');
                //$this->request = $request;
	}

	/**
	 * Show the application dashboard to the user.
	 *  Metodo de prueba.
	 * @return Response
	 */
        public function getOrm() // a traves del route puedo acceder a este metodo Route::get('socios/orm', 'HomeController@getOrm');
        {

           // $user = User::first();
           // dd($user->fullname); // podemos acceder gracias a getFullNameAttribute() de la clase users.php
           // dd($user->profile); // todo el objeto user profile
          //  dd($user->profile->age); // obtengo la edad del objeto gracias a getAgeAttribute() de la clase usersProfile

           /* $users = User::get();
            dd($users->toArray());*/

           /* $users = User::select('id','first_name') // toda tabla usuario ordenada, junto a la tabla relacional profile.
                    // -> aqui podría poner un join para solo coger usuarios con twitter etc..
                    ->with('profile') // objeto profile
                    ->where('first_name','<>','Benjamin')
                    ->orderBy('first_name','ASC')
                    ->get();
                    dd($users->toArray()); // lo traigo en array*/
        }

	public function index(Request $request)
	{
               $users = User::filterAndPaginate($request->get('id'),$request->get('type')); // uso de clase User
               return view('admin.home.index',compact('users'),array('usuario' => $this->auth->user()));
	}

        public function show(){ // función de prueba para ver el uso de los datos a traves de mysql directo.
            /*$user = User::findOrFail($id);
            return view('home',compact('user'));*/
             // $result = \DB::table('users')->get(); ver todo
                $result = \DB::table('users')
                //->select('users.first_name','users.last_name') 1ªforma
                ->select( // esto lo hago para obtener solo los datos que me interesan.
                        'users.*',
                        'user_profiles.id as profile_id',
                        'user_profiles.twitter',
                        'user_profiles.birthdate'
                )
                ->orderBy('id','ASC')
                ->leftJoin('user_profiles','users.id','=','user_profiles.user_id') // traemos info de user_profiles
                        // aunque user_profiles no exista con lefJoin permite traerlo todo.
                ->get();

                foreach($result as $row)
                {
                    $row->full_name= $row-> first_name . ' ' . $row->last_name;
                    $row->age = \Carbon\Carbon::parse($row->birthdate)->age;
                }
              //  dd($result);// imprime
		return view('admin.home.index',array('tabuser' => $result));
        }

}
