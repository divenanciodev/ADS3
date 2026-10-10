use test;

create table usuario(
	id int not null primary key auto_increment,
	nome varchar(100) not null,
    email varchar(250) not null unique
);


create table cliente(
	id int not null primary key auto_increment,
    nome varchar(100) not null,
    email varchar(250) not null unique,
    telefone varchar(20) not null unique
);


RENAME TABLE cliente TO clientes;

select * from clientes