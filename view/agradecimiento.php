{% extends "layout.php" %}

{% block tabActivo %}inicio{% endblock tabActivo %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}

<div class="jumbotron">
	<h1>Ya estas regristado como alumno del I.E.S Al-Andalus  "{{nombre}}"</h1>
	<p class="lead">Sus datos serán utilizados en el control de partes del instituto</p>
	<p>Para verificar sus datos enviaremos un email al correo <strong>{{correo}}</strong> que nos ha suministrado.</p>
</div>
{% endblock cuerpo %}
