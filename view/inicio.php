

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
	<h1>Bienvenid@</h1>
	<p class="lead">Te retamos a aprobar sin tener que estudiar. ¡Demuestra lo que sabes!</p>
</div>

<div id="qrcode1" class="qrcode"></div>

<script>
	$( document ).ready(function() {
    $("#qrcode1").qrcode({"text":"www.google.es"});
});

</script>

{% endblock cuerpo %}



