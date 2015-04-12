<?php namespace App\Http\Controllers;
use Illuminate\Support\Collection;
class AuthWelcomeController extends Controller {

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
		$this->middleware('auth');
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

			'<p>La residencia más</p><p>confortable y segura para</p><p>el hombre</p><p>es su propia</p><p>mente</p><p>virtuosa.</p><p>- Laozi</p>',
			'<p>La técnica interior</p><p>mental</p><p>es más importante</p><p> que la física.</p><p>- Gichin</p><p>Funa</p><p>koshi</p>',
			'<p>Dominar al enemigo</p><p>sin luchar, esta sí es la</p><p>más alta habilidad.</p><p>- Gichin</p><p>Funakoshi</p>',
			'<p>No luches con la</p><p>fuerza,absórbela,fluye con</p><p>y en ella,</p><p>úsala. - Yip</p><p>Man</p>',
			'<p>Recibe lo que viene,</p><p>ve cuando se retira y</p><p>continúa</p><p>cuando la mano</p><p>es</p><p>liberada. -</p><p>Yip Man</p>',
                        '<p>La simplicidad es</p><p>la clave de la brillantez</p><p>. - Yip Man</p>',
                        '<p>El camino de las</p><p>Artes Marciales comienza y</p><p>termina con</p><p>cortesía. -</p><p>Masu</p><p>tatsu</p><p>Oyama</p>',
                        '<p>El mejor uso que</p><p>se puede hacer de una</p><p>espada es no emplearla.</p><p>A</p><p>menos que</p><p>no haya</p><p>otra salida.</p>',
                        '<p>El secreto del combate</p><p> reside en el arte de</p><p>dirigirlo.</p><p> - Gichin</p><p>Funakoshi</p>'
                        
		])->random();
	}
        
        public static function functextoasocl(){
            return "<p>El hapkido procedente del sur de Corea.</p>
                <p>Es un arte marcial basado en la defensa personal militar.</p>
                <p>Un arte híbrido, donde la fuerza bruta no es un requisito primordial más bien el movimiento del cuerpo,
                la respiración y la velocidad de reacción al llevar a cabo las diferentes técnicas.</p>
                <p>Aunque es un arte marcial moderno, requiere un entrenamiento rigoroso y exigente.</p>";
        }
        
         public function functextoasocr(){
            return "<p>Significado:</p>
            <p>Los ideagramas que representan “hapkido” son los mismos que los del arte marcial tradicional japonés “aikido”, </p>
            <p>diferenciándose sólo en su pronunciación. </p>
            <p> Unión (hap),</p> <p>energía (ki)</p> <p>y camino (do).</p>";
        }
        
      /*  public function get_add(){
            re
        }*/
}
