{% extends "layout.php" %}

{% block tabActivo %}about{% endblock tabActivo %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}

<div class="jumbotron">
	<h1>Acerca del proyecto</h1>
	<p class="lead">Software para la gestión de incidencias de disciplina</p>
</div>

{% endblock cuerpo %}

