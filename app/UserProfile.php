<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model {
        // protected $table = 'user_profiles' puedes omitirlo si cumples con la convección en el nombre de clase.
	
        protected $table = 'user_profiles';
        protected $fillable = ['bio','twitter','website','birthdate','phone','user_id','taquilla'];
       // protected $hide = 'user_id';
    
    
        public function getAgeAttribute(){
            return \Carbon\Carbon::parse($this->birthdate)->age;
        }
        
         public static function filterAndPaginate($name,$type)
        {
           return User::name($name) // Usamos el metodo name haciendo referencia a scopeName de App/User
                    ->type($type)
                    ->orderBy('id','DESC')
                    ->paginate();                  
        }
        
       /* public function usuario(){
           return $this->hasOne('App\User');
        }*/
        
        
        
}
        
