<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request as EstatReq; //uso estatico
use App\Http\Requests\CreateUserRequest; // importamos datos
use App\Http\Requests\EditUserRequest; // importamos datos
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request; // uso dinamico
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use App\UserProfile;


class UsersController extends Controller {
    /*
     * $credentials = $request->only('email', 'password' , 'active');
     */
        protected  $request;
        protected $user;

        public function __construct(Guard $auth,Request $request) {
            $this->auth = $auth;
            //$this->middleware('is_contributor');
            $this->middleware('is_admin');
            $this->middleware('auth');


            $this->request = $request; // uso dinamico con constructor.
        }



        public function findUser(Route $route)
        {
            $this->user = User::findOrFail($route->getParameter('users'));
        }


	/**
         * PANEL DE CONTROL-LISTADO de USUARIOS
         * Puesto que hemos decidido que SOLO el usuario admin tendra acceso al panel de control, diremos que
	 * @return admin.users.index
	 */
	public function index(Request $request)
	{
                //$users = User::name($request->get('name'))->type($request->get('type'))->orderBy('id','DESC')->paginate();
                $users = User::filterAndPaginate($request->get('id'),$request->get('type')); // la variable users se usa en index.blade.php
                return view('admin.users.index',compact('users'),array('nombre' => $this->auth->user()->getFullNameAttribute()));
	}


	/**
	 * PANEL DE CREACIÓN DE USUARIOS con determinado ID.
         * Solo tendra acceso el usuario ADMIN.
         * -> El Form de create envia el data a store
	 * @return admin.users.create
	 */
	public function create()
	{
		return view('admin.users.create');
	}


	/**
	 * FUNCIÓN PARA LA CREACIÓN DE USUARIOS.
         * Esta función es utilizada por create(vista:admin.users.create) y por
         * auth/register (vista:admin.auth.register) También para editarlo.
         * TENDRAN ACCESO TANTO ADMIN, COMO GUEST.
	 * @return BACK
	 */
        public function store(CreateUserRequest $request){

            $user = User::create($request->all());
            UserProfile::create(['user_id'=>$user->id]);
            //Session::put('store_message', "- Activación de la cuenta en proceso -");
            return redirect()->back();
        }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return redirect()->back();
	}

        /**
         *
         * SOLO ACCESO DE
         */
        public function avanzado()
	{
            // if($this->auth->user()->type!='contributor')return redirect()->back();
             return view('admin.users.avanzado');
	}

	/**
	 * EDICION DE USUARIO SOLO ADMIN
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $user = User::findOrFail($id);
            return view('admin.users.edit',compact('user')); // esta variable es usada en edit.blade.php
	}

/*        public function editprofile($id)
	{
            $user = User::findOrFail($id);	//
            return view('admin.users.editprofile',compact('user'));
	}*/

	/**
	 * USADO POR ADMIN en :
	 * vistas : admin\users\edit.blade.php
         *          admin\users\partials\table.blade.php
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{
		$user = User::findOrFail($id);	//
                $user->fill($request->all());
                $user->save();
                return redirect()->back();
	}


	/**
	 * Remove the specified resource from storage.
	 *  USADO EN
         * vistas por admin :
         * admin\users\index.blade.php
         * admin\users\partials\delete.blade.php
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
               // dd('3');
                $user = User::findOrFail($id);
                $user->delete();

                $message = $user->full_name . ' fue eliminado de nuestros registros.';

                if($request->ajax()){
                    return response()->json([
                        'id' => $this->user->id,
                        'message' => $message
                    ]);
                }

                Session::flash('message',$message);
                return redirect()->route('admin.users.index');
	}

}
      /*  public function store(Request $request,Redirector $redirect) // uso de Request estatico. (EstatReq)
	{
            $data = EstatReq::all();
            $rules = array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'password'=> 'required',
                'type' => 'required'
            );

            $v = Validator::make($data,$rules);

            if($v->fails()){
              return redirect()->back()
                      ->withErrors($v->errors())
                      ->withInput(EstatReq::except('password'));
            }

           // Validator::make($data,$rules);
            //dd(Request::all()); // llamada a facades, llamadas estaticas con use Illuminate\Support\Facades\Request;
            //dd($this->request->all());
            // crear con fill: $user->fill($request->all());  // todo lo del llaves
            // crear con create: User::create($request->all());
            // creación con facabe y no con dependencias :
            // $user = User::create(Request::all());


            $user = new User($request->all()); // crear con dependencias.
            //$user->type = 'user'; de esta forma forzamos a que todo usuario sea de tipo usuario
            $user->save(); // guardamos en db
            return $redirect->route('admin.users.index'); // redireccionamos.
	}
*/
