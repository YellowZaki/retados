CREATE TABLE "PREGUNTAS" (
    "ID" INTEGER PRIMARY KEY AUTOINCREMENT,
    "TEXTO" TEXT,
    "ETIQUETAS" TEXT,
);

select count(*) from preguntas where etiquetas like "%"  ||  ( select texto from etiquetas like"%%" )  || "%";

