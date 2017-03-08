{% extends "layout.php" %}

{% block cabecera %}
	<link rel="stylesheet" type="text/css" href="/css/default.css" />
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

<form method="post" action="/prueba/guardar" role="form">
		
		<input type="hidden" name="id" value="{{comentario.ID}}"/>
		
		<div class="row">
			<div class="form-group col-md-12">
				<label for="texto">Pregunta:</label>
				<textarea style="width:100%" rows="8" cols="50" class="form-control" id="texto" name="texto"></textarea>
			</div>
		</div>
		
		<!-- Botonera del final -->
		
		<div class="form-group col-md-10"></div>
		
		<div class="form-group col-md-1">
			<button type="submit" class="btn btn-success">Aceptar</button>
		</div>
        <div class="form-group col-md-1">
			<a href="/alumnos/cancelar" class="btn btn-danger">Cancelar</a>
		</div>

</form>

{% endblock cuerpo %}

