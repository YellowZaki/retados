-- Describe RESUMENPARTESGRAVES
CREATE VIEW resumenPartesGraves as 
select "Incumplimiento de correcciones impuestas" motivo,
	count(*) numero
from partes
where G_INCUMPLIMIENTO = "1"
group by G_INCUMPLIMIENTO
union
select "Amenazas o coacciones" motivo,
	count(*) numero
from partes
where  G_AMENAZAS
group by G_AMENAZAS
union
select "Suplantación personalidad, falsificación o sustracción" motivo,
	count (*) numero
from partes
where G_SUPLANTACION ="1"
group by G_SUPLANTACION
union
select "Fumar en clase" motivo,
	count (*) numero
from partes
where G_FUMAR = "1"
group by G_FUMAR
union
select "Injurias y ofensas" motivo,
	count (*) numero
from partes
where G_OFENSAS = "1"
group by G_OFENSAS
union
select "Vejaciones y humillaciones" motivo,
	count (*) numero
from partes
where G_HUMILLACIONES = "1"
group by G_HUMILLACIONES
union
select "Deterioro grave inst., docu. o pertenencias" motivo,
	count (*) numero
from partes
where G_DETERIORO = "1"
group by G_DETERIORO
union
select "Impedimento del desarrollo de actividades" motivo,
	count (*) numero
from partes
where G_IMPEDIMENTO = "1"
group by G_IMPEDIMENTO
