{% extends "layout.php" %}

{% block cabecera %}
	<link rel="stylesheet" type="text/css" href="/css/default.css" />
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-tagsinput.css" />
	<script src="/js/modernizr.custom.js"></script>
	
{% endblock cabecera %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}

<div class="jumbotron">
	<h1>Formulario de prueba</h1>
	<p class="lead">Formulario para poder interactuar con datos introducidos por el usuario</p>
</div>

   <div class="form-group">
        <label class="col-lg-3 control-label">Cities</label>
        <div class="col-lg-5">
            <input type="text" name="cities" id="aa" class="form-control" value="" data-role="tagsinput" />
        </div>
    </div>
    
    
{% endblock cuerpo %}

