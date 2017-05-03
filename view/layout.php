<html lang="">
	<head>
		
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
			{% block cabecera %}
			{% endblock %}
		<title>Ret{A2}</title>

		<meta name="generator" content="Bootply" />
	    <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
	    <script src="/js/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="/css/styles.css" rel="stylesheet">
		<link href="/css/bootstrap.css" rel="stylesheet">
		 <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/sweet-alert.css">
  <link rel="stylesheet" href="/css/quiz.css">
	</head>
	<body>
		
		<script type="text/javascript">
		window.onload = function() {
		  EstablecerFecha();
		};				
							
		function EstablecerFecha() {
			var d = new Date();
			var n = d.getFullYear();
			document.getElementById("fecha").innerHTML = "<strong>Ret{A2}</strong> - (c) " + n + " I.E.S. Al-Ándalus";
		}
		</script>
<!-- Wrap all page content here -->
<div id="wrap">
  
<header class="masthead">
    <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1><a href="/" title="Bootstrap Template">Ret{A2}</a>
          <p class="lead">I.E.S Al-Ándalus</p></h1>
          
          

      </div>
      <div class="col-sm-6">
        <div class="pull-right  hidden-xs">    
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h3><i class="glyphicon glyphicon-cog"></i></h3></a>
          <ul class="dropdown-menu">
              <li><a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Link</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-user"></i> Link</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Link</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Link</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
</header>
  
  
<!-- Fixed navbar -->
<div class="navbar navbar-custom navbar-inverse navbar-static-top" id="nav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav nav-justified">
          <li><a href="/">Inicio</a></li>
          <li><a target="_blank" href="http://semillerodeempresas.blogspot.com.es/search/label/Ret%7BA2%7D">Novedades</a></li>
          <li class="active"><a href="/about"><strong>Acerca de</strong></a></li>
{% if login.isLogged() %}
								<li><a href="/logout"><span class="social fa fa-sign-out"></span>Log out</a></li>
                                <li class="dropdown">
                                </ul>
                                </div><!--/.nav-collapse -->
                                </div><!--/-container -->
                                </div><!--/.navbar-->
                                <!-- Begin page content -->
                                <div class="divider" id="section1"></div>
							{% else %}
								<li><a href="/login"><span href></span>Log in</a></li>
{% endif %}
            <ul class="dropdown-menu">
              <li><a href="/usuario/config">Configurar</a></li>
              <li><a href="/preguntas">Mis preguntas</a></li>
              <li><a href="/usuario/grupos">Grupos</a></li>
              <li><a href="/logout">Salir</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div><!--/.navbar -->
  
<!-- Begin page content -->
<div class="divider" id="section1"></div>
  

  <div class="col-sm-10 col-sm-offset-1">
    <div class="page-header text-center">
	  <br>
		           {% block cuerpo %} {% endblock %}
    </div>
  </div>
</div>



<div class="divider"></div>

<div class="row">
</div><!--/row-->

<div id="footer">
  <div class="container">
	<p class="text-muted" id="fecha"></p>
  </div>
</div>


<ul class="nav pull-right scroll-top">
  <li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>

	<!-- script references -->
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
		
		<script src="/tinymce/js/tinymce/tinymce.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="/js/scripts.js"></script>
		<script src="/js/jquery-qrcode-0.14.0.min.js"></script>
		<script src="/js/bootstrap-tagsinput.js"></script>
		 <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="/js/sweet-alert.min.js"></script>
		<script src="/js/quiz.js"></script>
	</body>
</html>
