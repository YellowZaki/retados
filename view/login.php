{% extends "layoutlogin.php" %}

{% block cuerpo %}

 <div id="header" class="row-fluid">

            
            <div class="col-sm-3">
			</div>
			
            <div class="col-sm-2">
				<img src="/img/logo.png">
			</div>
			
			<div class="col-sm-4">
				
				<form method="post" action="/login" role="form">
					
										
					{% if message %}
						<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
					{% endif %}

					{% if error %}
						<div class="alert alert-error" role="alert">{{ error|raw}}</div>
					{% endif %}	

					<div class="form-group">
						<label for="nombre">Usuario:</label>
						<input type="text" class="form-control" id="nombre" name="nombre">
					</div>
					
						<div class="form-group">
						<label for="clave">Contraseña:</label>
						<input type="password" class="form-control" id="clave" name="clave">
					</div>
					
					<button type="submit" class="btn btn-default">Enviar</button>
					
				</form>
				
			</div>
			
			<div class="col-sm-3">
			</div>
</div>				

{% endblock cuerpo %}

