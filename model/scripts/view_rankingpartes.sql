CREATE  VIEW rankingpartes AS
SELECT id_alumno, count(*)
FROM partes
WHERE fecha>'17/09/2015' and fecha<'24/06/2016'
GROUP BY id_alumno