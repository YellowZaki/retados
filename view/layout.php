<html lang="">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
			{% block cabecera %}
			{% endblock %}
		<title>Reta2</title>
		<script src="/tinymce/js/tinymce/tinymce.min.js"></script>
		<meta name="generator" content="Bootply" />
	    <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="/css/styles.css" rel="stylesheet">
		<link href="/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
<!-- Wrap all page content here -->
<div id="wrap">
  
<header class="masthead">
    <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1><a href="/" title="Bootstrap Template">{retA2}</a>
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
          <li><a href="http://semillerodeempresas.blogspot.com.es/search/label/%7BReta2%7D">Novedades</a></li>
          <li><a href="/preguntas">Preguntas</a></li>
          <li class="active"><a href="/about"><strong>Acerca de</strong></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi perfil<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/usuario/config">Configurar</a></li>
              <li><a href="/usuario/preguntas">Mis preguntas</a></li>
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


  
  <hr>
  
  <div class="col-sm-8">
      
      <div class="row form-group">
        <div class="col-xs-3">
          <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required="">
        </div>
        <div class="col-xs-3">
          <input type="text" class="form-control" id="middleName" name="firstName" placeholder="Middle Name" required="">
        </div>
        <div class="col-xs-4">
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required="">
        </div>
      </div>
      <div class="row form-group">
          <div class="col-xs-5">
          <input type="email" class="form-control" name="email" placeholder="Email" required="">
          </div>
          <div class="col-xs-5">
          <input type="email" class="form-control" name="phone" placeholder="Phone" required="">
          </div>
      </div>
      <div class="row form-group">
          <div class="col-xs-10">
          <input type="homepage" class="form-control" placeholder="Website URL" required="">
          </div>
      </div>
      <div class="row form-group">
          <div class="col-xs-10">
            <button class="btn btn-default pull-right">Contact Us</button>
          </div>
      </div>
    
  </div>
  
</div><!--/row-->

<div class="container">
  	<div class="col-sm-8 col-sm-offset-2 text-center">
      <h2>Reta2</h2>
      
      <hr>
      <h4>
        I.E.S Al-Ándalus
      </h4>
      <hr>
      
  	</div><!--/col-->
</div><!--/container-->
  
</div><!--/wrap-->

<div id="footer">
  <div class="container">
    <p class="text-muted">Alberto Gómez</p>
  </div>
</div>

<ul class="nav pull-right scroll-top">
  <li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="/js/scripts.js"></script>
	</body>
</html>
