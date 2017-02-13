create view resumenPartesLeves as 
select "Perturbar el desarrollo de la clase" motivo,
	count (*) numero
from partes
where L_PERTURBAR = "1"
Group by L_PERTURBAR
union 
select "Dificultar el estudio de los compañeros" motivo,
	count(*) numero
from partes
where L_DIFICULTAR = "1"
group by L_DIFICULTAR
union
select "Faltar a clase injustificadamente" motivo,
	count(*) numero
from partes
where  L_FALTARINJUSTIFICADAMENTE
group by L_FALTARINJUSTIFICADAMENTE
union
select "Deteriorar instalaciones, documentos o pertenencias" motivo,
	count (*) numero
from partes
where L_DETERIORAR ="1"
group by L_DETERIORAR
union
select "Utilizar el teléfono móvil en clase" motivo,
	count (*) numero
from partes
where L_MOVIL = "1"
group by L_MOVIL
union
select "Usar gafas de sol en clase" motivo,
	count (*) numero
from partes
where L_GAFAS = "1"
group by L_GAFAS
union
select "Usar el ordenador indebidamente" motivo,
	count (*) numero
from partes
where L_GORRA = "1"
group by L_GORRA
union
select "Permanecer en los pasillos en los recreos" motivo,
	count (*) numero
from partes
where L_PASILLOS = "1"
group by L_PASILLOS
union
select "Faltar injustificadamente a clase antes de un examen" motivo,
	count (*) numero
from partes
where L_FALTAINJUSTIFICADA = "1"
group by L_FALTAINJUSTIFICADA
union
select "No colaborar de forma sistemática" motivo,
	count (*) numero
from partes
where L_NOCOLABORAR = "1"
group by L_NOCOLABORAR
union
select "Ser impuntual sin justificación" motivo,
	count (*) numero
from partes
where L_IMPUNTUAL = "1"
group by L_IMPUNTUAL
union
select "Ser desconsiderados con profesores, compañeros . . ." motivo,
	count (*) numero
from partes
where L_DESCONSIDERABLES = "1"
group by L_DESCONSIDERABLES
union
select "Comer o beber en clase" motivo,
	count (*) numero
from partes
where L_BEBEROCOMER = "1"
group by L_BEBEROCOMER
union
select "No traer o no utilizar el material necesario" motivo,
	count (*) numero
from partes
where L_FALTAMATERIAL = "1"
group by L_FALTAMATERIAL
union
select "No utilizar ordenadores sin permiso" motivo,
	count (*) numero
from partes
where L_ORDENADOR = "1"
group by L_ORDENADOR
union
select "Alterar el orden y limpieza en zonas comunes" motivo,
	count (*) numero
from partes
where L_ALTERAR = "1"
group by L_ALTERAR
union
select "Fumar en el recinto escolar" motivo,
	count (*) numero
from partes
where L_FUMAR = "1"
group by L_FUMAR
union
select "Usar indebidamente material en aulas específicas" motivo,
	count (*) numero
from partes
where L_USOINDEBIDO = "1"
group by L_USOINDEBIDO