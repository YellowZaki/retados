CREATE VIEW alumno as
select id, alumnoa NOMBRE, correoelectrnico EMAIL, direccin DIRECCION, telfono TELEFONO, '' COMENTARIO, localidadderesidencia LOCALIDAD,provinciaderesidencia PROVINCIA, dnipasaporteprimerturor DNI_TUTOR, unidad CURSO 
from alumnos_seneca
WHERE AODELAMATRCULA=(SELECT MAX(AODELAMATRCULA) FROM alumnos_seneca);
