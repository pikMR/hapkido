<?php namespace App\Http\Middleware;
Use Closure;
Use Illuminate\Auth\Guard;
Use Illuminate\Session\Store;
/**
 * Creado con php artisan make:middleware IsAdmin
 * ATENCIONNNN!! SI CREAS UNA CLASE NUEVA, TENDRAS QUE AÑADIRLA AL Kernel.php
 */
abstract class IsType {
    private $auth;
    private $session;
    private $request;
    /*
     * Constructor con inyección de dependencias..
     * Laravel automaticamente carga la dependencia, por tanto todos los metodos 
     * de la clase admin recogerán los componentes de autenticación.
     */
    public function __construct(Guard $auth, Store $session){

        $this->auth = $auth;
        $this->session = $session;
    }
    
    private function getTipos(){
        // recogemos los usuarios que coinciden con las rutas
        $path = $this->request->path() ;
        
        $resultado = array_get(
                config('options.references'),$path 
        );
        
        if(empty($resultado)){
            return "admin";
        }
        // si hay muchos usuarios los dividimos con el operador or
        if(is_array($resultado))
            return(implode("||",$resultado));
        // si no devolvemos el usuario.
        return($resultado);
    }
    
    abstract public function getType();
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
           
           if($this->auth->user() == null){ // si el usuario 'guest' quiere acceder..
              return redirect()->to('auth/login');
           }
           
           $this->request = $request;

                if(!$this->auth->user()->is_tipos($this->getTipos())){ // si no hay ningun usuario con el nombre y ruta entramos para salir.
                  //  $this->auth->logout(); // de esta forma hago un logout
                    if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->to('auth/login');
                                // utilizo "to" para no tener problemas con el login recursivo.
			}
                    
                }
		return $next($request);
           }
}
