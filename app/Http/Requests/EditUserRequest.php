<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;
/**
 * Su uso va implicito en los metodos del controlador en cuestión, en este caso "UsersControllers@store"
 */
class EditUserRequest extends Request {

	/**
         * Creado con php artisan make:request EditUser..
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
         
         private $route;
        public function __construct(Route $route){
            $this->route = $route;
        }
        
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(){
               $tipo =  substr(implode(',',array_keys(config('options.types'))) , 1);
               // implode para pasar a un string separado por ',' el contenido del array, utilizo substr para descartar el primer caracter ',', array_keys para seleccionar las keys.
		return [
                    'first_name' => 'required', 
                    'last_name' => 'required', 
                    'email' => 'required|unique:users,email,' . $this->route->getParameter('id'), 
                    // puesto que usamos el controlador en ambos casos, tendremos que dar opción a uno o otro caso php artisan route:list para ver el parametro..
                    // con get parameter recogemos el id del usuario para excluirlo
                    'type' => 'required|in:' . $tipo
		];
	}

}
