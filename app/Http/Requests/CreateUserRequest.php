<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
/**
 * Su uso va implicito en los metodos del controlador en cuestión, en este caso "UsersControllers@update"
 */
class CreateUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true; // noos dice si el usuario esta autorizado a hacer el request
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
            $tipo =  substr(implode(',',array_keys(config('options.types'))) , 1);
		return [
                     'first_name' => 'required', 
                    'last_name' => 'required', 
                    'email' => 'required|unique:users,email,' . $this->route->getParameter('id'),
                    'password'=> 'required', 
                    'type' => 'required|in:' . $tipo
                    // algo a tener en cuenta type |in:foo,.. te permitira crear solo usarios del tipo incluido.
		];
	}

}
