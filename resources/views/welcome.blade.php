<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="hapkido en murcia" content="Somos practicantes de hapkido en la ciudad de murcia y esta es nuestra web">
    <meta name="robots" content="Index, Follow">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1 user-scalable=no"/>
    <link rel="icon" type="image/png" href="images/favicon.png" />
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
        <!-- CABECERA -->
        <span itemscope itemtype="http://schema.org/Event">
            <div class="contenido">
                    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="priceCurrency" content="USD" />    
                        <div class="titulo">{{ $titulo }}
                            <div class="quote">
                                <a>
                                <span itemprop="url">hapkidomurcia.es</span>
                                <span itemprop="price"></span>      
                                </a>
                            </div>
                        </div>
                    </span>
            </div>

            <!-- PASADOR DE FOTOS EN CABECERA Y DENTRO LA RECEPCIÓN DEL FORMULARIO DE CONTACTO -->
            <div class="container-fluid text-center">
                <div class="header">
                    @if(Session::has('message'))
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
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
                <meta itemprop="image" content="http://www.hapkidomurcia.es/images/resized/4.JPG">
            </div>

             <!-- MENU PRINCIPAL -->                       
            <div id="menu">
                <a href="#about" class="smooth">La Asociación</a>  
                <a href="#instalacion" class="smooth">Nuestra Filosofia</a>  
                <a href="#social" class="smooth">Social</a> 
                <a href="#findus" class="smooth">Contacto</a> 
                <a href="socios">Socios</a> 
            </div>

            <!-- TODA LA PRESENTACIÓN -->
            @include ('asociacion')
            <!-- REFLEXIÓN ESPIRITUAL -->
            @include ('instalaciones')
            <!-- CONTENIDO DE REDES SOCIALES -->
            @include ('multimedia') 
            <meta itemprop="startDate" content="2013-09-28">
            <!-- Formulario de contacto -->
                <div class="ten two columns">
                @include ('pasafotos')
                 </div>
            @include('about.contact')

        </span>

        <!-- SCRIPTS -->
        <script src="js/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.hammer-full.min.js"></script>
        <script src="assets/jQuery-slideshow-plugin/plugin.js"> </script>
        <script src="js/jform.js"></script>
        <script src="js/scroll.js"></script>
        <script src="js/easing.js"></script>
        <script src="js/cabecera.js"></script>
        <script src="js/smooth.js"></script>
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
