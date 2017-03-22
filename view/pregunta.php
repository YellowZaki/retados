{% extends "layout.php" %}

{% block cabecera %}
	<link rel="stylesheet" type="text/css" href="/css/default.css" />
	<!--<link rel="stylesheet" type="text/css" href="/css/component.css" />-->
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
	<h1>Alumnos registrados</h1>
	<p class="lead">Listado de alumnos</p>
</div>

<form method="post" action="/alumnos/guardar" role="form">
		
		<input type="hidden" name="id" value="{{comentario.ID}}"/>
		
		
		<div class="form-group col-md-12">
			<label style="width:20px" "left:30px" class="derecha" for="nombre">Pregunta: </label>
			<textarea style="width:100px" rows="8" cols="90" class="form-control" id="comentario" name="descripcion" >{{comentario.COMENTARIO}}</textarea>
		</div>
		
		<div class="form-group col-md-10"></div>
			
		<div class="form-group col-md-12">
			<table class="table table-bordered table-hover" id="invoiceTable">
				<thead>
					<tr>
						<th width="95%">Item No</th>	
						<th width="5%">Correcta</th>		
						
					</tr>
				</thead>
			<tbody>					
				<tr>
					<td><input data-type="productCode" name="texto" id="itemNo_7" class="form-control autocomplete_txt ui-autocomplete-input" autocomplete="off" type="text"></td>
					<td style="text-align: center; vertical-align: middle; "><input class="case" type="radio" name="correcta"></td>
				</tr>
				
				<tr>
					<td><input data-type="productCode" name="texto" id="itemNo_7" class="form-control autocomplete_txt ui-autocomplete-input" autocomplete="off" type="text"></td>
					<td><input class="case" type="radio" name="correcta"></td>
				</tr>
				
				
				<tr>
					<td><input data-type="productCode" name="texto" id="itemNo_7" class="form-control autocomplete_txt ui-autocomplete-input" autocomplete="off" type="text"></td>
					<td><input class="case" type="radio" name="correcta"></td>
				</tr>
						
				<tr>
					<td><input data-type="productCode" name="texto" id="itemNo_7" class="form-control autocomplete_txt ui-autocomplete-input" autocomplete="off" type="text"></td>
					<td><input class="case" type="radio" name="correcta"></td>
				</tr>
			
				
				
					
		</tbody>
			</table>
		</div>

		<div class="form-group col-md-10"></div>	
		
		<div class="form-group col-md-1">
			<button type="submit" class="btn btn-success">Aceptar</button>
		</div>
        <div class="form-group col-md-1">
			<a href="/alumnos/cancelar" class="btn btn-danger">Cancelar</a>
		</div>

		
</form>
	<script>tinymce.init({ selector:'textarea' });</script>

{% endblock cuerpo %}
