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
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value="{{comentario.NOMBRE}}">
		</div>
		<div class="form-group col-md-12">
			<label for="apellido">Apellidos:</label>
			<input type="text" class="form-control" id="apellido" name="apellido"  value="{{comentario.APELLIDO}}">
		</div>
		
			<div class="form-group col-md-12">
			<label for="correoelectronico">Correo Electrónico:</label>
			<input type="text" class="form-control" id="email" name="email" value="{{comentario.EMAIL}}">
		</div>
		<div class="form-group col-md-12">
		<label for="calle">Calle:</label>
			<input type="text" class="form-control" id="direccion" name="direccion" value="{{comentario.DIRECCION}}">
		</div>
		
		  <div class="form-group col-md-6">
		  <label for="codigopostal">Código Postal:</label>
		    <input type="text" class="form-control" id="codigopostal" name="codigopostal" size="12" value="">
 </div>
 
		   <div class="form-group col-md-6">
		  <label for="localidad">Localidad:</label>
			<input type="text" class="form-control" id="localidad" name="localidad" size="12" value="">
 </div>
		<div class="form-group col-md-12">
		<label for="provincia">Provincia:</label>
			<input type="text" class="form-control" id="provincia" name="provincia" value="{{comentario.PROVINCIA}}">
		</div>
		<div class="form-group col-md-12">
		<label for="tutor1">D.N.I:</label>
			<input type="text" class="form-control" id="dni" name="dni" value="{{comentario.DNI}}">
		</div>
		<div class="form-group col-md-12">
			<label for="dni">Tutor 1:</label>
			<input type="text" class="form-control" id="tutor1" name="tutor1" value="{{comentario.TUTOR1}}">
		</div>
		<div class="form-group col-md-12">
		<label for="tutor2">D.N.I:</label>
			<input type="text" class="form-control" id="dni" name="dni" value="{{comentario.DNI}}">
		</div>
		<div class="form-group col-md-12">
			<label for="dni">Tutor 2:</label>
			<input type="text" class="form-control" id="tutor2" name="dni" value="{{comentario.TUTOR2}}">
		</div>
		
		<div class="form-group col-md-10"></div>
		
		<div class="form-group col-md-1">
			<button type="submit" class="btn btn-success">Aceptar</button>
		</div>
        <div class="form-group col-md-1">
			<a href="/alumnos/cancelar" class="btn btn-danger">Cancelar</a>
		</div>
		
		<!-- ANOTACIONES DEL ALUMNO -->
		<!-- Cómo cambiar los iconos [https://css-tricks.com/html-for-icon-font-usage/] -->

		<div class="form-group col-md-12">
				<ul class="cbp_tmtimeline">
					<li>
						<time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>18:30</span><span>14/10/15</span> </time>
						<div class="cbp_tmicon cbp_tmicon-parteleve"></div>
						<div class="cbp_tmlabel">
							<h2>Parte leve</h2>
							<p>El alumno come chicle en clase y no cumple con el acuerdo de clase.</p>
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-11T12:04"> <span>12:04</span><span>4/11/15</span></time>
						<div class="cbp_tmicon cbp_tmicon-retraso"></div>
						<div class="cbp_tmlabel">
							<h2>Retraso</h2>
							<p>A primera hora llega tarde sin pasar por jefatura de estudios</p>
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-13 05:36"> <span>05:36</span><span>23/12/15</span></time>
						<div class="cbp_tmicon cbp_tmicon-anotacion"></div>
						<div class="cbp_tmlabel">
							<h2>Anotación</h2>
							<p>Demuestra una especial predilección por las matemáticas</p>
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-15 13:15"> <span>13:15</span><span>4/01/16</span></time>
						<div class="cbp_tmicon cbp_tmicon-tutoria"></div>
						<div class="cbp_tmlabel">
							<h2>Información al tutor</h2>
							<p><STRONG>INFORMÁTICA: </STRONG> Muestra mucho interés por la asignatura y se le ve motivado.</p>
						</div>
					</li>
				</ul>
			</div>
</form>

{% endblock cuerpo %}

