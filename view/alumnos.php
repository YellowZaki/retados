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
	<h1>Lista de alumnos</h1>
	<p class="lead">Alumnos matriculados en el centro</p>
</div>

<table id="myTable">  
        <thead>  
          <tr>  
            <th>Nº Alumno</th>  
            <th>Nombre</th>  
            <th>Email</th>  
            <th>Dirección </th> 
            <th>Acción </th> 
          </tr>  
        </thead>  
        <tbody> 
        
        {% for alumno in alumnos %}
        
          <tr>  
            <td>{{alumno.ID}}</td>  
            <td>{{alumno.NOMBRE}}</td>  
            <td>{{alumno.EMAIL}}</td>  
            <td>{{alumno.DIRECCION}} </td><td><a href="/alumnos/borrar?id={{alumno.ID}}"><img width="32px" src="http://findicons.com/files/icons/2226/matte_basic/32/trash_can1.png"></a>
		<a href="/alumnos/editar?id={{alumno.ID}}"><img width="32px" src="http://findicons.com/files/icons/2226/matte_basic/32/document_edit.png"></a><br></td>
		</td>
            
          </tr>  
          
          {% endfor %}
         
        </tbody>  
      </table>  
      {% endblock cuerpo %}

