{% extends "layout.php" %}

{% block tabActivo %}contacto{% endblock tabActivo %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}

<form>
   <label for="matricula">Matricula:</label>
   <input type="text" id="matricula" name="matricula" value=""/> <br/>
   <label for="nombre">Nombre:</label>
   <input type="text" id="nombre" name="nombre" value=""/> <br/>
   <label for="paterno">Paterno:</label>
   <input type="text" id="paterno" name="paterno" value=""/> <br/>
   <label for="materno">Materno:</label>
   <input type="text" id="materno" name="materno" value=""/>
</form>

	<script type="text/javascript">

<!--
$(document).ready(function(){
    $( "#matricula" ).autocomplete({
      source: "/alumnos/buscar/nombre",
      minLength: 2
    });
 
    $("#matricula").focusout(function(){
      $.ajax({
            url:'/alumnos/buscar/id',
          type:'POST',
          dataType:'json',
          data:{ matricula:$('#matricula').val()}
      }).done(function(respuesta){
          $("#nombre").val(respuesta.nombre);
          $("#paterno").val(respuesta.paterno);
          $("#materno").val(respuesta.materno);
      });
    });
});
-->

$(document).ready(function(){
    $( "#matricula" ).autocomplete({
      source: "/alumnos/buscar/nombre",
      minLength: 2
    });
 
    $("#matricula").focusout(function(){
      $.ajax({
            url:'/alumnos/buscar/id',
          type:'POST',
          dataType:'json',
          data:{ matricula:$('#matricula').val()}
      }).done(function(respuesta){
          $("#nombre").val(respuesta.nombre);
          $("#paterno").val(respuesta.paterno);
          $("#materno").val(respuesta.materno);
      });
    });
});






		<!--http://www.jose-aguilar.com/blog/autocompletar-campo-con-jquery-ajax-y-php/ -->
	</script> 
	
{% endblock %}
