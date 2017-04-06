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
	<h1>CREAR PREGUNTA</h1>
</div>

<form method="post" action="/preguntas/guardar" role="form">
		
		<input type="hidden" name="id" value="{{comentario.ID}}"/>
		
		
		<div class="form-group col-md-12">
			
			<label for="texto">Pregunta:</label>
			<textarea style="width:100%" rows="8" cols="50" class="form-control" id="comentario" name="texto" >{{comentario.TEXTO}}</textarea>

		</div>
		
		<div class="form-group col-md-10">
			
<p>tags</p>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">    
    <link rel="stylesheet" href="/css/app.css">
    
    <div class="example example_typeahead">
		
        <div class="bs-docs-example">
          <input type="text" value="" />
        </div>
        
	</div>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-tagsinput.min.js"></script>
    <script src="js/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js"></script>
    <script src="js/app_bs2.js"></script>
    
    </div>
    
		<div class="form-group col-md-12">
			<table class="table table-bordered table-hover" id="invoiceTable">				
				<thead>
					<tr>
						<th width="95%">Respuesta</th>	
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
					<td style="text-align: center; vertical-align: middle; "><input class="case" type="radio" name="correcta"></td>
				</tr>
				
				<tr>
					<td><input data-type="productCode" name="texto" id="itemNo_7" class="form-control autocomplete_txt ui-autocomplete-input" autocomplete="off" type="text"></td>
					<td style="text-align: center; vertical-align: middle; "><input class="case" type="radio" name="correcta"></td>
				</tr>
						
				<tr>
					<td><input data-type="productCode" name="texto" id="itemNo_7" class="form-control autocomplete_txt ui-autocomplete-input" autocomplete="off" type="text"></td>
					<td style="text-align: center; vertical-align: middle; "><input class="case" type="radio" name="correcta"></td>
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
