<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;
/**
 * Esta clase actualmente no se utiliza, se guarda para futuros usos de Profile
 */
class EditProfileRequest extends Request {

          public function __construct(Route $route){
            $this->route = $route;
        }
        
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
                   /* 'bio', 'email' => 'required|unique:users,email,' . $this->route->getParameter('users')
                    'twitter',
                    'website',
                    'birthdate'*/
		];
	}

}
