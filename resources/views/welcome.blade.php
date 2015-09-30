<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="hapkido en murcia" content="Somos practicantes de hapkido en la ciudad de murcia y esta es nuestra web">
    <meta name="robots" content="Index, Follow">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1 user-scalable=no"/>
    <title>HAPKIDOMURCIA.ES | Practica Hapkido en MURCIA, tu mejor DOJANG</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/jQuery-slideshow-plugin/plugin.css">
	<link rel="stylesheet" type="text/css" href="css/estilo3.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="css/windy.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
	<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
		<noscript><link rel="stylesheet" type="text/css" href="css/noJS.css" /></noscript>
	<div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=206074422791238&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
	<style>
			.contenido {
				 position:absolute;
				 z-index:600;
				 background-color:#FFFFFF;
				 width:100%;
				 top:0px;
				 left:0px;
				 
				display: table-cell;
				vertical-align: middle;
				text-align: center;
				display: inline-block;
			}
			.titulo {
				font-weight: 20;
				font-family: 'Lato';
				font-size: 40px;
				margin-bottom: 40px;
			}
			.quote {
				text-align:right;
				font-family: 'Arial';
				font-size: 24px;
			}
		</style>
</head>

<body>
			<div class="contenido">
                            <div class="titulo">{{ $titulo }}<div class="quote"><a>hapkidomurcia.es</a></div></div>
				
			</div>
<div class="container-fluid text-center">
    <div class="header">
        @if(Session::has('message'))
<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>
    <div class="alert alert-info">
         Correo Enviado!
    </div>
@endif     
		
        <div class="col-lg-12">
        <img class="headerImg col-sm-push-12"
             src="images/resized/1.JPG"
             data-slideshow='images/resized/4.JPG|images/resized/2.JPG|images/resized/3.JPG'>
        </div>

    </div>
</div>
<div id="menu">
    <a href="#about" class="smooth">La Asociación</a>  
    <a href="#instalacion" class="smooth">Nuestra Filosofia</a>  
    <a href="#media" class="smooth">Noticias</a> 
    <a href="#findus" class="smooth">Contacto</a> 
    <a href="socios">Socios</a> 
</div>
    
    <div id="about" class="section fadeIn">

       <div class="container" style="margin-top: 177px;">
    <div class="six columns">
        <img src="images/general/maestro2.JPG">
    </div>
    <div class="six columns">
        <img src="images/general/maestro3.JPG">
    </div>
    <div class="clear"></div>
       </div>
        @include ('asociacion')
    </div>
    <div id="instalacion" style="section fadeIn">
        
        <div class="container" style="margin-top:0px;">
            <h4 style="margin-left: 100px;"><a href="http://masalladelmasalla.blogspot.com.es/2008/06/i-shin-den-shin.html">I shin den shin</a>: De Mi Espíritu a tú Espíritu</h4>
    @include ('instalaciones')
    </div>
    </div>
    
    <div id="about" class="section fadeIn" style="background: none repeat scroll 0% 0% #E9E9E9;
    background-color: #E9E9E9;
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    background-clip: border-box;
    background-origin: padding-box;
    background-size: auto auto;">
        
        <div class="container" style="margin-top: 0px;">
            <div class="five columns">
                <!--p> Texto de referencia cabecera  </p-->
            <img src="images/general/tejado3.png">
            </div>
        </div>
      
        <div class="container_multimedia" style="margin-top: 0px;"> 
           <div class="twelve columns" style="right: 0px;top:330px;">
       <a class="twitter-timeline"  href="https://twitter.com/HAPKIDO_MURCIA" data-widget-id="574874501479075841">Tweets de @HAPKIDO_MURCIA.</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

            </div> <!-- ahora incluimos youtube -->
            @include ('multimedia') 
            <div class="col-sm-pull-0">
                <div class="persoimagen columns" id="media">
                    <div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><div class="fb-post" data-href="https://www.facebook.com/aheac/posts/1135926866435295" data-width="500"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/aheac/posts/1135926866435295"><p>Sigenos en nuestro grupo de FACEBOOK : https://www.facebook.com/groups/312117028856432/</p>Posted by <a href="https://www.facebook.com/aheac">Hapkidomurcia.es</a> on&nbsp;<a href="https://www.facebook.com/aheac/posts/1135926866435295">Lunes, 28 de septiembre de 2015</a></blockquote></div></div>
					 <p class="findus">Si quieres acceder a nuestro grupo de facebook, haz click sobre este enlace y te agregaremos sin problemas !</p>
                    <div class="fb-like" data-href="https://www.facebook.com/groups/312117028856432/" data-width="150" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					@include ('pasafotos') 
				</div>
	
                    
                
            </div>
            
    <div class="clear"></div>
    </div>
       
    </div>
    
        <div id="findus" class="section fadeIn">
		<div style="margin-top: 100px;" class="container">
			<div class="three columns title">
				<img class="stamp_find" src="images/general/dragon.png">
                                <p class="subhead">CALLE DON QUIJOTE, SANBASILIO<br><a><font color="FFF0CC">MURCIA</font></a>, 30009<br>619 805 027 </p>
				<p class="diamond">♦</p>
				
					<p><span>Martes - Jueves</span><br>19:00 - 21:00</p>
				
					<p><span>Lunes - Miercoles - Viernes</span><br>21:00 - 23:00</p>
				
					<p><span>Sabados</span><br>10:00 - 13:00</p>
				 
				
				<p class="subhead">CONTACTA CON NOSOTROS!</p>
				<p>
                                    Envia alguna sugerencía o pregunta
				</p>
			</div>
			<div class="nine columns">
				<div class="hide_terms">
					<div class="gone">
						@include('about.contact')
                                        </div>
				</div>
			</div>
		</div>
        </div>
			<!--script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script-->
			<script src="js/jquery.js"></script>
			<!--script src="js/jquery.cycle2.min.js"></script-->
			<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.hammer-full.min.js"></script>
			<script src="assets/jQuery-slideshow-plugin/plugin.js"> </script>
			<script src="js/jform.js"></script>
			<script src="js/scroll.js"></script>
			<script src="js/easing.js"></script>
			<script src="js/cabecera.js"></script>
			<script src="js/smooth.js"></script>
			<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
        <script type="text/javascript" src="js/jquery.windy.js"></script>
			<script type="text/javascript">	
				$(function() {

					var $el = $( '#wi-el' ),
						windy = $el.windy(),
						allownavnext = false,
						allownavprev = false;

					$( '#nav-prev' ).on( 'mousedown', function( event ) {

						allownavprev = true;
						navprev();
					
					} ).on( 'mouseup mouseleave', function( event ) {

						allownavprev = false;
					
					} );

					$( '#nav-next' ).on( 'mousedown', function( event ) {

						allownavnext = true;
						navnext();
					
					} ).on( 'mouseup mouseleave', function( event ) {

						allownavnext = false;
					
					} );

					function navnext() {
						if( allownavnext ) {
							windy.next();
							setTimeout( function() {	
								navnext();
							}, 150 );
						}
					}
					
					function navprev() {
						if( allownavprev ) {
							windy.prev();
							setTimeout( function() {	
								navprev();
							}, 150 );
						}
					}

				});
			</script>	
			<script>
				$(document).ready(function () {
					$('img').slideShow();
				});
			</script>
</body>
</html>
