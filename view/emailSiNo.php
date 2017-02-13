<html>
<head>
	<title>Prueba</title>
</head>
<body>
	<table cellspacing="0" cellpadding="0" width="40%">
		<tr>
			<td>{{pregunta | raw}}</td>
		</tr>
		<tr>
			<td> &nbsp;</td>
		</tr>
	</table>
	<table cellspacing="0" cellpadding="0" width="40%">
	
		<tr>
			<td align="center" width="100%" height="40" bgcolor="green" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
				<a href="{{aceptar.url}}" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF">{{aceptar.texto}}</span></a>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td align="center" width="100%" height="40" bgcolor="red" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
				<a href="{{cancelar.url}}" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF">{{cancelar.texto}}</span></a>
			</td>
		</tr>
	</table>
	
</body>
</html>		
