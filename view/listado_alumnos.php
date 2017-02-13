<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
	
    <title>Listado</title>
    
</head>

<div class="container">
    <div class="row">
		{% for alumno in alumnos %}
			<div class="col-md-12" style="background-color:{% if loop.index is odd %}grey{% else %}white{% endif %}">{{alumno.NOMBRE}}</div>
        {% endfor %}
    </div>
</div>
</body>

</html>
