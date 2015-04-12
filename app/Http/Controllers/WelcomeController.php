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
            $lema = "<p>HONRADEZ</p><p>RESPONSABILIDAD</p><p>SINCERIDAD</p>";
            $txtizquierda = WelcomeController::functextoasocl();
            $txtderecha = WelcomeController::functextoasocr();
            $titulo = WelcomeController::quote();
		return view('welcome',array('titulo' => $titulo,'lema' => $lema,'asocizq' => $txtizquierda,'asocder' => $txtderecha));
        }
                
        public static function quote()
	{
		return Collection::make([
			'<p>La residencia más confortable y segura para el hombre es su propia mente virtuosa.- Laozi</p>',
			'<p>La técnica interior mental es más importante que la física.- GichinFunakoshi</p>',
			'<p>Dominar al enemigo sin luchar, esta sí es la más alta habilidad.- GichinFunakoshi</p>',
			'<p>No luches con la fuerza,absórbela,fluye con y en ella, úsala. - YipMan</p>',
			'<p>Recibe lo que viene,ve cuando se retira y continúa cuando la mano es liberada. -Yip Man</p>',
                        '<p>La simplicidad es la clave de la brillantez. - Yip Man</p>',
                        '<p>El camino de las Artes Marciales comienza y termina con cortesía. -MasutatsuOyama</p>',
                        '<p>El mejor uso que se puede hacer de una espada es no emplearla.A menos que no haya otra salida.</p>',
                        '<p>El secreto del combate reside en el arte de dirigirlo. - GichinFunakoshi</p>',
                        '<p>El Hapkido Es el camino para reconciliarse con el mundo y hacer que la humanidad se transforme un una única familia</p>',
                        '<p>El hombre que busca venganza debe cabar 2 tumbas</p>',
                        '<p>Aún si tu espíritu está calmado, no dejes que tu cuerpo se relaje.Y cuando tu cuerpo esté relajado, no dejes que tu espíritu holgazanee.</p>'

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
            return "
            Los ideagramas que representan “hapkido” son los mismos que los del arte marcial tradicional japonés “aikido”, 
            diferenciándose sólo en su pronunciación. Cada uno de ellos es una pieza clave en las artes marciales y fundamentales para la vida.</p>
            <p> Unión (HAP),energía (KI) y camino (DO).</p>";
        }


    /*  public function get_add(){
            re
        }*/
}
