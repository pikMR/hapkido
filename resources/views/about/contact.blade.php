<div id="findus" class="section fadeIn">
    <div style="margin-top: 100px;" class="container">
        <div itemprop="location" itemscope itemtype="http://schema.org/Place" class="three columns title">
            <img class="stamp_find" src="images/general/dragon.png">
            <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="subhead">
            <span itemprop="streetAddress">CALLE DON QUIJOTE</span>, <span itemprop="addressLocality">SANBASILIO</span><br>
            <a><font color="FFF0CC" itemprop="addressRegion">MURCIA</font></a>, <span itemprop="postalCode">30009</span><br>619 805 027 </p>
            <p class="diamond">♦</p>
            <p><span>Martes - Jueves</span><br>19:00 - 21:00</p>
            <p><span>Lunes - Miercoles - Viernes</span><br>21:00 - 23:00</p>
            <p><span>Sabados</span><br>10:00 - 13:00</p>	
            <p itemprop="name" class="subhead">CONTACTA CON NOSOTROS!</p>
            <p>
                Envia alguna sugerencía o pregunta
            </p>       
        </div>
        <p itemprop="name" class="subhead">A.H.E.A.C</p>
        <div class="nine columns">
            <div class="hide_terms">
                <div class="gone">
                    {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
                    <div class="form-group">
                        {!! Form::label('Tu nombre') !!}
                        {!! Form::text('name', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'nombre')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Tu correo') !!}
                        {!! Form::text('email', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'email')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Tu duda / mensaje') !!}
                        {!! Form::textarea('message', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'Mensaje')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enviar!', 
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>