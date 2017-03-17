{% extends "layout.php" %}

{% block tabActivo %}comentarios{% endblock tabActivo %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}

<div class="jumbotron">
	<h1>Preguntas registradas</h1>
	<p class="lead">Listado de preguntas</p>
</div>

{% for pregunta in preguntas %}
	
		{{pregunta.TEXTO}}<BR>
		
		<a href="/preguntas/borrar?ID={{pregunta.ID}}"><img width="32px" src="/img/borrar.png"></a>
		<a href="/preguntas/editar?ID={{pregunta.ID}}"><img width="32px" src="/img/editar.png"></a><br>
		----------------<br>
{% endfor %}
	
{% endblock cuerpo %}

