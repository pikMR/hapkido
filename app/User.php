<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name','email', 'password','type','active'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember token'];
        
        public function profile(){    
           return $this->hasOne('App\UserProfile'); // cada usuario tiene un solo perfil
        }
        /*
             * Intentaremos usar Fluent(basado en PDO-uso de base de datos con poo), un constructor de querys)
             * PDO proporciona una capa de abstracción de acceso a datos, lo que significa que, independientemente 
             * de la base de datos que se esté utilizando, se usan las mismas funciones para realizar consultas y obtener datos.
             *  PDO no proporciona una abstracción de bases de datos; no reescribe SQL ni emula características ausentes. 
             * Se debería usar una capa de abstracción totalmente desarrollada si fuera necesaria tal capacidad. 
             * 
             * y también el uso de Eloquent( el ORM de laravel)
             * En el desarrollo de una aplicación suelen estar involucradas dos entidades diferentes, por una parte  el código que mueve la aplicación y
             * por otra los datos que se manejan. Con el tiempo estas dos entidades han evolucionado de manera diferente, y el acceso a los datos desde 
             * los programas se ha vuelto una tarea en ocasiones, complicada. Los sistemas de Mapeo Objeto-Relacional u ORM ayudan a combatir esta complicación.
         */
        
        public function getFullNameAttribute(){
            //dd('full name');
            return $this->first_name . ' ' . $this->last_name;
        }
        
        public function setPasswordAttribute($value)
        {
              if(! empty ($value))
                $this->attributes['password'] = \Hash::make($value);       
        }
        
        /**
         * Condicional para filtrar los registros, con busqueda por nombre "$name"
         * @param type $query
         * @param type $name
         */
        public function scopeName($query, $name)
        {
            if(trim($name) != "")
                $query->where('full_name',"LIKE","%$name%"); 
            /* forma manipulando el seed y migrations con php artisan migrate:refresh --seed
              *$query->where(\DB::raw("CONCAT(first_name, ' ', last_name)"),"LIKE", "%$name%"); 
              *consulta con mysql recuerda que DB es una variable "alias" de app.php        */
              
        }
        
        public function scopeType($query , $type){
            $types = config('options.types');
            
            if ($type != "" && isset($types[$type])){
               $query->where('type',$type); 
               // importante saber que si se quieren usar comparaciones se usara where('type','>',$type)
            }
               
        }
        
        public static function filterAndPaginate($name,$type)
        {
            return User::name($name)
                    ->type($type)
                    ->orderBy('id','DESC')
                    ->paginate();            
        }
        
        public function is($type){
            return $this->type == $type;
        }
        
        /**
         * 
         * @param type $type Lista de tipos de acceso
         * @return comprueba que esta contenido y devuelve true o false.
         */
         public function is_tipos($type){
            if($type=="auth")
                return true; // este sería el caso de entrada a profile.
            return(strpos($type,$this->type)!==false); // en el caso de encontrar el substring de ese tipo 
        }
        
        public function isAdmin(){ // usando type no se usaría.
            return $this->type == 'admin'; // a usar en el Middware isAdmin.php
        }
        
}
