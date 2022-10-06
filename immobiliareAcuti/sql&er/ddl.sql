CREATE TABLE proprietario(
    id integer unsigned auto_increment,
    nome varchar(30) not null,
    cognome varchar(30) not null,
    via varchar(30),
    civico tinyint,
    citta varchar(30),
    telefono varchar(15),
    mail varchar(255) not null,

    primary key(id)
);

CREATE TABLE zona(
    id integer unsigned auto_increment,
    nome varchar(30),

    primary key(id)
);

CREATE TABLE tipologia(
    id integer unsigned auto_increment,
    nome varchar(30),

    primary key(id)
);

CREATE TABLE immobile(
    id integer unsigned auto_increment,
    nome varchar(30),
    via varchar(30),
    civico tinyint,
    metratura integer,
    piano tinyint,
    locali tinyint,
    idZona integer unsigned,
    idTipologia integer unsigned,

    primary key (id),
    foreign key(idZona) references zona(id),
    foreign key(idTipologia) references tipologia(id)
);

CREATE TABLE possiede(
    id integer unsigned auto_increment,
    data_acquisto date,
    idProprietario integer unsigned,
    idImmobile integer unsigned,

    primary key(id),
    foreign key(idProprietario) references proprietario(id),
    foreign key(idImmobile) references immobile(id)
);