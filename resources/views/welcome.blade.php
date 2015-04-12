<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no"/>
    <title>Proyecto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/jQuery-slideshow-plugin/plugin.css">
	<link rel="stylesheet" type="text/css" href="css/estilo3.css">
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=206074422791238&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
</head>

<body>
        
<div class="container-fluid text-center">
    <div class="header">
        <div id="holder"><div id="scroll">
		<MARQUEE WIDTH="100%" HEIGHT="40" ALIGN="BOTTOM">
		{!! trim($titulo) !!}
		</MARQUEE>
		</div></div>
     
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
            <h4 style="margin-left: 100px;">I shin den shin: De Mi Espíritu a tú Espíritu</h4>
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
      
        <div class="container" style="margin-top: 0px;"> 
           <div class="five columns" style="right: 0px;top:280px;">
       <a class="twitter-timeline"  href="https://twitter.com/HAPKIDO_MURCIA" data-widget-id="574874501479075841">Tweets por el @HAPKIDO_MURCIA.</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    </div> <!-- ahora incluimos youtube -->
            @include ('multimedia') 
            <div class="persoimagen columns" id="media">
       <img src="assets/images/inline/original.jpg"
                 data-slideshow='assets/images/inline/img1.jpg|assets/images/inline/img2.jpg|assets/images/inline/img3.jpg|assets/images/inline/img4.jpg'
                 alt="Inline pictures">
       <p class="findus" style="margin-top: 100px;">Si quieres acceder a nuestro grupo de facebook, haz click sobre este enlace y te agregaremos sin problemas !</p>
       <div class="fb-like" data-href="https://www.facebook.com/groups/312117028856432/" data-width="300" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" style="top: 30px;"></div>
    </div>
    <div class="clear"></div>
       </div>
       
    </div>
    
        <div id="findus" class="section fadeIn">
		<div style="margin-top: 100px;" class="container">
			<div class="three columns title">
				<img class="stamp_find" src="images/general/dragon.png">
				<p class="subhead">CALLE DON QUIJOTE, SANBASILIO<br>MURCIA, 30009<br>619 805 027 </p>
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
			<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.hammer-full.min.js"></script>
			<script src="assets/jQuery-slideshow-plugin/plugin.js"> </script>
			<script src="js/jform.js"></script>
			<script src="js/scroll.js"></script>
			<script src="js/easing.js"></script>
			<script src="js/cabecera.js"></script>
			<script src="js/smooth.js"></script>
			<script>
				$(document).ready(function () {
					$('img').slideShow();
				});
			</script>
</body>
</html>
