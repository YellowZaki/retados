-- Apellidos más habituales
select primerapellido, count(*) from alumnos_seneca group by primerapellido order by count(*) desc;

-- Alumnos x localidad
select localidadderesidencia, count(*) from alumnos_seneca group by localidadderesidencia order by count(*) desc;

-- Nº Alumnos MATRICULADOS cada curso
select aodelamatrcula AÑO, count(*) ALUMNOS from alumnos_seneca group by aodelamatrcula order by AÑO;

-- Listado de HERMANOS en el centro
select dni_tutor, count(*) from alumno group by dni_tutor order by count(*) desc;