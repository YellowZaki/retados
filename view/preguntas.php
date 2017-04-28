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


<button type="button" href="#" class="btn btn-warning""glyphicon">
	        <span class="glyphicon glyphicon-plus"></span> Nueva Pregunta 
        </button>


{% for pregunta in preguntas %}

	<div class="form-group col-md-12">
			<table class="table table-bordered table-hover" id="invoiceTable">				
				<thead>
				
					<tr>
							
				<th width="95%">Preguntas</th>
				<th width="5%">Respuestas</th>

	
					</tr>
					
				</thead>
				<tbody style=" .table-hover">
		

		<a href="/preguntas/borrar?ID={{pregunta.ID}}"><img width="32px" src="/img/borrar.png"></a>
		<a href="/preguntas/editar?ID={{pregunta.ID}}"><img width="32px" src="/img/editar.png"></a><br>
		----------------<br>
		
{% endfor %}

	{% for pregunta in preguntas %}

	
		<tr>


	<div>
		<tbody>
			<tr>


				<td width="95%">{{pregunta.TEXTO|raw}}</td>

				<td width="5%"><a href="/preguntas/borrar?ID={{pregunta.ID}}"><img width="32px" src="/img/borrar.png"></a>
					<a href="/preguntas/editar?ID={{pregunta.ID}}"><img width="32px" src="/img/editar.png"></a><br></td>
					
			</tr>
	{% endfor %}
		</tbody>
	</table>
</div>

{% endblock cuerpo %}

