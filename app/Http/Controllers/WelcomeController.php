<?php namespace App\Http\Controllers;
use Illuminate\Support\Collection;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            $lema = "<p><a title='Ser honrado con todas las personas, y creer en la propia justicia (saber distinguir lo correcto de lo incorrecto).'>"
                    . "HONRADEZ</a></p><p>"
                    . "<a title='Se es dueño, y responsable de todo lo que se dice y hace.'>RESPONSABILIDAD</a></p>"
                    . "<p><a title='Lo que se dice, se hace. No hay diferencia entre hablar y hacer para un samurái.'>SINCERIDAD</a></p>";
            $txtizquierda = WelcomeController::functextoasocl();
            $txtderecha = WelcomeController::functextoasocr();
            $titulo = WelcomeController::quote();
		return view('welcome',array('titulo' => $titulo,'lema' => $lema,'asocizq' => $txtizquierda,'asocder' => $txtderecha));
        }
                
        public static function quote()
	{
		return Collection::make([
			'La residencia más confortable y segura para el hombre es su propia mente virtuosa.- Laozi',
			'La técnica interior mental es más importante que la física.- GichinFunakoshi',
			'Dominar al enemigo sin luchar, esta sí es la más alta habilidad.- GichinFunakoshi',
			'No luches con la fuerza,absórbela,fluye con y en ella, úsala. - YipMan',
			'Recibe lo que viene,ve cuando se retira y continúa cuando la mano es liberada. -Yip Man',
                        'La simplicidad es la clave de la brillantez. - Yip Man',
                        'El camino de las Artes Marciales comienza y termina con cortesía. -MasutatsuOyama',
                        'El mejor uso que se puede hacer de una espada es no emplearla.A menos que no haya otra salida.',
                        'El secreto del combate reside en el arte de dirigirlo. - GichinFunakoshi',
                        'El Hapkido Es el camino para reconciliarse con el mundo y hacer que la humanidad se transforme un una única familia',
                        'El hombre bueno es maestro del homnre no bueno,y el hombre no bueno es su bien material,porque el buen maestro no tiene interés,porque a su material no le tiene apego.',
                        'Aún si tu espíritu está calmado, no dejes que tu cuerpo se relaje.Y cuando tu cuerpo esté relajado, no dejes que tu espíritu holgazanee.',
                        'Aprende la enseñanza del silencio, y tendrás la ventaja del no hacer.Muy pocos bajo el cielo comprenden su importanciá. - El uso de lo Universal.'

		])->random();
	}
        
        public static function functextoasocl(){
            return "El hapkido procedente del sur de Corea.
                Es un arte marcial basado en la defensa personal militar.
                Un arte híbrido, donde la fuerza bruta no es un requisito primordial más bien el movimiento del cuerpo,
                la respiración y la velocidad de reacción al llevar a cabo las diferentes técnicas.
                Aunque es un arte marcial moderno, requiere un entrenamiento rigoroso y exigente.";
        }
        
         public static function functextoasocr(){
            return "Los ideagramas que representan “hapkido” son los mismos que los del arte marcial tradicional japonés “aikido”, 
            diferenciándose sólo en su pronunciación. Cada uno de ellos es una pieza clave en las artes marciales y fundamentales para la vida.";
        }


    /*  public function get_add(){
            re
        }*/
}
