CREATE VIEW partesporprofesor AS 
SELECT PROFESOR, count (*) numero from partes group by PROFESOR  order by numero desc 
