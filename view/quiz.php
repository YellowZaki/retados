

{% extends "layout.php" %}

{% block tabActivo %}inicio{% endblock tabActivo %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Quiz Example</title>
  
</head>
<body>
  <div class="container-fluid">
    <div id="quiz"></div>
  </div>
  <script>
	  
    $(function() {
      $('#quiz').quiz("tpc.json");
    });
  </script>

</body>
{% endblock cuerpo %}
