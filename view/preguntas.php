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
	
		pregunta.TEXTO<BR>
		
		<a href="/borrar?id={{pregunta.ID}}"><img width="32px" src="http://findicons.com/files/icons/2226/matte_basic/32/trash_can1.png"></a>
		<a href="/editar?id={{pregunta.ID}}"><img width="32px" src="http://findicons.com/files/icons/2226/matte_basic/32/document_edit.png"></a><br>
		----------------<br>
{% endfor %}
	
{% endblock cuerpo %}

