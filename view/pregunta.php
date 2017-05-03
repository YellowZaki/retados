{% extends "layout.php" %}

{% block cabecera %}
	<link rel="stylesheet" type="text/css" href="/css/default.css" />
	<!--<link rel="stylesheet" type="text/css" href="/css/component.css" />-->
	<script src="/js/modernizr.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/default.css" />
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-tagsinput.css" />
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
		
		<input type="hidden" name="id" value="{{pregunta.ID}}"/>
		
		
		<div class="form-group col-md-12" style="width:80%">
			<label for="texto">Pregunta:</label>
			<textarea style="width:100%" rows="8" cols="50" class="form-control" id="texto" name="texto" >{{pregunta.TEXTO}}</textarea>
		</div>
		
   <div class="form-group" style="float:right;margin-top:-290px;width:21%;">
        <label style="margin-left:20px;float:left;">TAGS</label>
        <br>
        <div style="margin-left:20px;float:left;display: inline-block;margin-bottom: 5px;max-width: 100%;font-weight: 700;">
            <input type="text" name="cities" id="aa" class="form-control" value="" data-role="tagsinput" />
        </div>
    </div>		
		
		
		
		<div class="form-group col-md-10">
			

    
		<div class="form-group col-md-12">
			<table class="table table-bordered table-hover" id="invoiceTable">				
				<thead>
					<tr>
						<th width="95%">Respuesta</th>	
						<th width="5%">Correcta</th>		
						
					</tr>
				</thead>
				<tbody style= ".table-hover">					
					
					 {% for respuesta in pregunta.respuestas %}
					<tr>

						<td><input data-type="productCode" name="respuesta[]" id="itemNo_7" value="{{respuesta.TEXTO}}" class="form-control autocomplete_txt ui-autocomplete-input" autocomplete="off" type="text"></td>
						<td style="text-align: center; vertical-align: middle; "><input class="case" type="radio" name="correcta" value="{{loop.index}}" {{respuesta.CORRECTA==1 ? "checked" : ""}} ></td>

					</tr>
					{% endfor %}
				
						
				</tbody>
			</table>
		</div>

		<div class="form-group col-md-10"></div>	
		
		<div class="form-group col-md-1">
			<button type="submit" class="btn btn-success">Aceptar</button>
		</div>
        <div class="form-group col-md-1">
			<a href="/preguntas" class="btn btn-danger">Cancelar</a>
		</div>

				
</form>

	<script>tinymce.init({ selector:'textarea' });</script>

{% endblock cuerpo %}
