<body>
    <div class="container">
        <!-- ===========================
        HEADER
        ============================ -->
        <div id="header" class="row">
            <div class="col-sm-2">
                <img class="propic" src="/img/logo.png" alt="">
            </div>
            <!-- photo end-->

            <div class="col-sm-10">
                <div class="cv-title">
                    <div class="row">
                        <div class="col-sm-7">
                            <h1>Control de Partes</h1>
                        </div>
                        <div class="col-sm-5 text-right dl-share">
                            
                        </div>
                    </div>
                    <h2 style="margin-top: 0px; padding-left: 5px;">IES Al-Ándalus</h2>
                </div><!-- Title end-->

                <!-- ===========================
                SOCIAL & CONTACT
                ============================ -->
                
                <!--
				    <li id="notificaciones"><a href="/notificaciones">Notificaciones</a></li>
				    
                -->
                <div class="row">
                    <div class="col-sm-8">
                        <ul class="list-unstyled">
                        </ul>
                    </div><!-- social 1st col end-->

                    <div class="col-sm-2">
                        <ul class="list-unstyled">
                            <li><a href="/"><span class="social fa fa-home"></span>Inicio</a></li>
                        </ul>
                    </div><!-- social 2nd col end-->
                    
                    <div class="col-sm-2">
                        <ul class="list-unstyled">
                            <li><a href="/about"><span class="social fa"></span>Acerca de</a></li>
                        </ul>
                    </div><!-- social 2nd col end-->
                    
                    <!-- social 3rd col end-->
                </div><!-- header social end-->
            </div><!-- header right end-->
        </div><!-- header end-->

        <hr class="firsthr">

        <!-- ===========================
        BODY LEFT PART
        ============================ -->
        <div class="col-md-9 mainleft">
            <div id="statement" class="row mobmid">
                
                <div class="col-sm-12">
                    <!--<h3>Inicio </h3>
                    <p>Bienvenidos a la página principal de Control de Partes</p>-->
                    {% block cuerpo %} {% endblock %}
                    <script>
						$(document).ready(function(){
							$('#myTable').dataTable();
						});
					</script>
                </div><!--info end-->
            </div><!--personal statement end-->

        </div><!--left end-->
        
        <!-- ===========================
        SIDEBAR
        =========================== -->
        <div class="col-md-3 mainright">
            <div class="row">
                <div class="col-sm-1 col-md-2 mobmid">
                    <span class="secicon fa fa-briefcase"></span>
                </div><!--icon end-->

                <div class="col-sm-11 col-md-10 ">
                    <h3 class="mobmid">MENÚ</h3>

                   <li id="grafica"><a href="/grafica">Grafica Alumnos</a></li>
                   
                    <p>Alumnos</p>
                    <ul>
						<li><a href="/alumnos/crear">Crear</a></li>
						<li>Buscar</li>
						<li><a href="/alumnos">Listar</a></li>
						<li><a href="/importar">Importar</a></li>
					</ul>
					
                    <p>Notificaciones</p>
                    <ul>
						<li><a href="/notificaciones">Listar</a></li>
					</ul>

                    <p>Partes</p>
                    <ul>
						<li><a href="/partes/crear">Crear</a></li>
						<li>Buscar</li>
						<li><a href="/partes">Listar</a></li>
					</ul>
                    <p>Usuarios</p>
                    <ul>
						<li><a href="/usuarios/crear">Crear</a></li>
						<li>Buscar</li>
						<li><a href="/usuarios">Listar</a></li>
						<li>Importar</li>
					</ul>

                    <p>Salir</p>
                    
                </div><!--info end-->
            </div><!--tech skills end-->
		</div><!--right end-->
    </div><!--container end-->

    
    <footer class="text-center">  ... </footer>

    <!--necessary scripts and plugins-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/evenfly.js"></script>
    
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$('#myTable').dataTable();
		});
	</script>
</body>

</html>
