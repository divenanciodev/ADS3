create database bancodb;

use bancodb;

create table curso(
	codigo int primary key,
    nome varchar(30) not null,
    ch varchar(10) not null,
    data_abertura date
);

create table aluno(
	matricula varchar(10) not null primary key,
    nome varchar(30) not null,
    sexo char(1),
    idade int,
    curso_aluno_fk int not null,
    foreign key(curso_aluno_fk) references curso(codigo)
);

create table disciplina(
	id int not null primary key auto_increment,
    nome varchar(30),
    ch varchar(10) not null,
    ementa text,
    curso_disciplina_fk int not null,
    foreign key(curso_disciplina_fk) references curso(codigo)
);

create table professor(
	matricula varchar(10) not null primary key,
    cpf bigint(12) not null,
    nome varchar(30),
    sexo char(1),
    idade int,
    titulacao_max varchar(10),
    professor_disciplina_fk int not null,
    foreign key(professor_disciplina_fk) references disciplina(id)
);
    