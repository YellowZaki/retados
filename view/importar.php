{% extends "layout.php" %}

{% block tabActivo %}importar{% endblock tabActivo %}

{% block cuerpo %}

<div class="jumbotron">
	<h1>Se han importado a la tabla "{{table}}" {{inserted_rows}} filas.</h1>
	<p class="lead"></p>
</div>

{% endblock cuerpo %}

