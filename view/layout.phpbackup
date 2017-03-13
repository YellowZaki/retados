<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
    
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css">	
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.css" media="print">
    
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/responsive.css">
	<link rel="stylesheet" href="/css/datatable.css">
	<link rel="stylesheet" href="/css/datatable2.css"></style>
	<link href="/css/jqueryui.css" type="text/css" rel="stylesheet"/>
    <link href="/css/datepicker.css" rel="stylesheet">
    
	<script src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/loader.js"></script>
	
    {% block cabecera %}
			
			
		    <!--
			<link href="/css/bootstrap-combined.min.css" rel="stylesheet">
			<link href="/css/bootstrap-theme.min.css" rel="stylesheet">
			<link href="/css/jumbotron-narrow.css" rel="stylesheet">
			
   
   		-->
			
	{% endblock %}
		
    <title>Control de Partes</title>

    <!-- ===========================
    FONTS & ICONS
    =========================== -->
    <link href="/css/datatable3.css" rel='stylesheet' type='text/css'>
    <link href="/css/datatable4.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jsapi.js"></script>
    <link href="/css/datatable5.css" rel="stylesheet" type="text/css">
	<link href="/css/menulateral.css" rel="stylesheet" type="text/css">

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container" style="width:97%">
        <!-- ===========================
        HEADER
        ============================ -->
        <div id="header" class="row hidden-print" >
            <div class="col-sm-2">
                <a href="/"><img class="propic" src="/img/logo.png" alt=""></a>
            </div>
            <!-- photo end-->

            <div class="col-sm-10">
                <div class="cv-title">
                    <div class="row">
                        <div class="col-sm-7">
                            <h1>Control de Partes</h1>
                        </div>
                        <div class="col-sm-5 text-right dl-share" >
                            
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
                    <div class="col-sm-6">
						{% if login.isLogged() %}
							<ul class="list-unstyled"> {{ login.getUsuario().getNombre() }} [{{ login.getUsuario().getRol() }}]</ul>
                        {% endif %}
                    </div><!-- social 1st col end-->
                    
                    <div class="col-sm-2">
						<ul class="list-unstyled">
							{% if login.isLogged() %}
								<li><a href="/logout"><span class="social fa fa-sign-out"></span>Log out</a></li>
							{% else %}
								<li><a href="/login"><span class="social fa fa-cog"></span>Log in</a></li>
							{% endif %}
						</ul>
					</div><!-- social 2nd col end-->
					
					<div class="col-sm-2">
                        <ul class="list-unstyled">
                            <li><a href="/about"><span class="social fa fa-info"></span>Acerca de</a></li>
                        </ul>
                    </div><!-- social 2nd col end-->
                    
                    <div class="col-sm-2">
                        <ul class="list-unstyled">
							<li><a href="/"><span class="social fa fa-home"></span>Inicio</a></li>
                        </ul>
                    </div><!-- social 2nd col end-->
                    
                    
                    
                    <!-- social 3rd col end-->
                </div><!-- header social end-->
            </div><!-- header right end-->
        </div><!-- header end-->

        <hr class="firsthr hidden-print">

        <!-- ===========================
        BODY LEFT PART
        ============================ -->
        <div class="col-md-9 mainleft">
            <div id="statement" class="row mobmid" style="margin left:40px">
                
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
        <div class="col-md-3 mainright hidden-print">
            <div class="row">
                
                <div class="col-sm-13 col-md-10 ">
                    <h3 class="mobmid" style="margin-top: 5px;">MENÚ</h3>
				</div>
				<div class="col-sm-1 col-md-2 mobmid">
                    <span class="secicon fa fa-briefcase"></span>
                </div><!--icon end-->
                
			</div>
			<div class="row">
				<div class="col-sm-13 col-md-12 ">
					<ul id="accordion" class="accordion">
						  {% if acl.isAllowed(login.getUsuario().getRol(), '/alumnos','mostrar') %}
							  <li>
								<div class="link">Alumnos<i class="fa fa-chevron-down"></i></div>
								<ul class="submenu">
									<li><a href="/alumnos/crear">Crear</a></li>
									<li><a href="/alumnos">Listar</a></li>
									{% if acl.isAllowed(login.getUsuario().getRol(), '/alumnos/importar','mostrar') %}<li><a href="/alumnos/importar">Importar</a></li>{% endif %}
								</ul>
							  </li>
						  {% endif %}
						  <li>
							<div class="link">Anotaciones<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">
							  <li><a href="/alumnos/anotaciones/crear">Crear</a></li>
								</ul>
								</li>
						  
						  <li>
							<div class="link">Notificaciones<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">
							  <li><a href="/notificaciones">Listar</a></li>
							</ul>
						  </li>
						  <li>
							<div class="link">Partes<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">
							  <li><a href="/partes/crear">Crear</a></li>
												<li><a href="/partes">Listar</a></li>
							</ul>
						  </li>
						  <li>
							<div class="link">Usuarios<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">
								<li><a href="/usuarios/crear">Crear</a></li>
								<li><a href="/usuarios">Listar</a></li>
							</ul>
						  </li>
						  <li>
							<div class="link"><a href="/logout">Salir</a></div>				
				          </li>			        			        						
					</ul>
                </div> <!-- jasv -->
                
            </div><!--info end-->
                
            
		</div><!--right end-->

    

    <!--necessary scripts and plugins-->

    <script src="/js/bootstrap.min.js"></script>
    
    <script src="/js/jquery.nicescroll.min.js"></script>
    <script src="/js/evenfly.js"></script>
    
	<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript" src="/js/1.10.2jquery-ui.min.js"></script>
	<!-- [https://goo.gl/KXLLgo] DatePicker usado -->
    <script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/locales/bootstrap-datepicker.es.min.js"></script>
	
	<!-- TODO llevar a la vista concreta en la que se vaya a usar -->
	
	<script>
		$(document).ready(function(){
			$('#myTable').dataTable();
		});
	</script>
	<script>
		$(function() {
			var Accordion = function(el, multiple) {
				this.el = el || {};
				this.multiple = multiple || false;

				// Variables privadas
				var links = this.el.find('.link');
				// Evento
				links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
			}

			Accordion.prototype.dropdown = function(e) {
				var $el = e.data.el;
					$this = $(this),
					$next = $this.next();

				$next.slideToggle();
				$this.parent().toggleClass('open');

				if (!e.data.multiple) {
					$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
				};
			}	

			var accordion = new Accordion($('#accordion'), false);
		});
</script>
</body>

</html>
