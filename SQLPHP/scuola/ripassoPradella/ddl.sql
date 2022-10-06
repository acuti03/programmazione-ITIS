-- CREAZIONE DI UN DATABASE
CREATE DATABASE prova;

-- CREAZIONE DI UNA TABELLA
CREATE TABLE libri(
    id integer unsigned auto_increment not null,
    nome varchar(50),
    autore varchar(30),
    prezzo float,
    primary key(id)
);

-- FARE UNA INSERT
INSERT INTO libri(nome, autore, prezzo) 
VALUES("padre ricco", "robert", 12.99);
INSERT INTO libri(nome, autore, prezzo) 
VALUES("diario", "simone", 15.99);
INSERT INTO libri(nome, autore, prezzo) 
VALUES("diario", "simone", 21.99);

-- ORDINAMENTO TABELLA
SELECT * FROM libri
ORDER BY prezzo ASC;

SELECT * FROM libri
WHERE prezzo >= 15;