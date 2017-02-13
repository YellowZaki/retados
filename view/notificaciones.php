{% extends "layout.php" %}

{% block tabActivo %}notificaciones{% endblock tabActivo %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}

<div class="jumbotron">
	<h1>Notificaciones registradas</h1>
	<p class="lead">Lista de notificaciones</p>
	{% for notificacion in notificaciones %}
	
		{% for campo, valor in notificacion %}
			{{campo}} : {{valor}} <br>
		{% endfor %}
		
		<a href="/alumnos/borrar"><img width="32px" src="http://findicons.com/files/icons/2226/matte_basic/32/trash_can1.png"></a>
		<a href="/alumnos/editar"><img width="32px" src="http://findicons.com/files/icons/2226/matte_basic/32/document_edit.png"></a><br>
		----------------<br>
	{% endfor %}
</div>

{% endblock cuerpo %}


