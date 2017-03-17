<html lang="">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
			{% block cabecera %}
			{% endblock %}
		<title>Reta2</title>
		<script src="/tinymce/js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
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
        <h1><a href="/" title="Bootstrap Template">Reta2</a>
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
          <li><a href="#">Inicio</a></li>
          <li><a href="#section2">Reta2</a></li>
          <li><a href="#section3">Novedades</a></li>
          <li class="active"><a href="#section1"><strong>Sección</strong></a></li>
          <li><a href="#section4">¿Quiénes somos?</a></li>
          <li><a href="#section5">¿Dónde estamos?</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Más <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div><!--/.navbar -->
  
<!-- Begin page content -->
<div class="divider" id="section1"></div>
  
<div class="container">
  <div class="col-sm-10 col-sm-offset-1">
    <div class="page-header text-center">
	  <textarea></textarea>
	  <br>
		           {% block cuerpo %} {% endblock %}
    </div>
  </div>
</div>
    
<div class="divider" id="section2"></div>
  
<section class="bg-1">
  <div class="col-sm-6 col-sm-offset-3 text-center"><h2 style="padding:20px;background-color:rgba(5,5,5,.8)">Reta2</h2></div>
</section>
  
<div class="divider"></div>
   
<div class="container" id="section3">
  	<div class="col-sm-8 col-sm-offset-2 text-center">
      <h1>Novedades</h1>
      
      <p>
      Texto de relleno.
      </p>
      
      
      
      
  	</div><!--/col-->
</div><!--/container-->

<div class="divider"></div>
  
<section class="bg-3" id="section4">
  <div class="col-sm-6 col-sm-offset-3 text-center"><h2 style="padding:20px;background-color:rgba(5,5,5,.8)">¿Quienes somos?</h2></div>
</section>
  

</div><!--/container-->

<div class="divider" id="section5"></div>

<div class="row">

  <h1 class="text-center">¿Dónde estamos?</h1>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3175.179820319474!2d-5.541996649681004!3d37.267162779756184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd129b513e110c79%3A0x96e0403e7bba6b71!2sInstituto+De+Educaci%C3%B3n+Secundaria+Al+Andalus!5e0!3m2!1ses!2ses!4v1489578748356" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
  
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
      <ul class="list-inline center-block">
        <li><a href="http://facebook.com/bootply"><img src="/assets/example/soc_fb.png"></a></li>
        <li><a href="http://twitter.com/bootply"><img src="/assets/example/soc_tw.png"></a></li>
        <li><a href="http://google.com/+bootply"><img src="/assets/example/soc_gplus.png"></a></li>
        <li><a href="http://pinterest.com/in1"><img src="/assets/example/soc_pin.png"></a></li>
      </ul>
      
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
		<script src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
