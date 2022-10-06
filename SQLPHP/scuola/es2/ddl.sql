CREATE DATABASE esercizi;

CREATE TABLE cliente(
    id integer unsigned auto_increment not null,
    nome varchar(30),
    email varchar(225),
    password char(32),
    primary key(id)
);