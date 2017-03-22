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
	<p class="lead">Software para aprobar sin esfuerzo</p>
</div>

  <h1 class="text-center">¿Dónde estamos?</h1>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3175.179820319474!2d-5.541996649681004!3d37.267162779756184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd129b513e110c79%3A0x96e0403e7bba6b71!2sInstituto+De+Educaci%C3%B3n+Secundaria+Al+Andalus!5e0!3m2!1ses!2ses!4v1489578748356" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

{% endblock cuerpo %}

