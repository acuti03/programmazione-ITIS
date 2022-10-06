CREATE TABLE cliente(
    id integer unsigned auto_increment not null,
    Cognome varchar(25),
    Nome varchar(25),
    primary key(id)
)
CREATE TABLE noleggio(
    id integer unsigned auto_increment not null,
    CLIENTEid integer,
    FILMid integer,
    data date,
    costo float,
    reso char(1),
    primary key(id),
    foreign key (CLIENTEid) references cliente(id),
    foreign key (FILMid) references film(id)
)
CREATE TABLE film(
    id integer unsigned auto_increment not null,
    titolo varchar(10),
    Anno_prod date
)
CREATE TABLE attore_film(
    id integer unsigned auto_increment not null,
    attore_id integer,
    film_id integer,
    Ruolo varchar(50)
    foreign key (film_id) references film(id),
    foreign key (attore_id) references attore(id)
)
CREATE TABLE attore(
    id integer unsigned auto_increment not null,
    Cognome varchar(30),
    Nome varchar(30)
)