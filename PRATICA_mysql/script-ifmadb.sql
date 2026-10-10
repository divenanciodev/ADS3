create database ifmadb;

use ifmadb;

create table aluno(
	cpf bigint(12) not null,
    nome varchar(100) not null,
	idade int,
    matricula varchar(10) not null,
    sexo char(1)
);

INSERT INTO aluno (cpf, nome, idade_aluno, matricula, data_nascimento, endereco_aluno_fk)
VALUES ('45323454376', 'Maria Gonzales do Nascimento', '25', '453GB56', '23-12-2002', 1);

UPDATE aluno
SET data_nascimento = '2002-12-23'
WHERE cpf = 45323454376;
    
ALTER TABLE aluno
CHANGE idade idade_aluno int;

ALTER TABLE aluno
ADD endereco_aluno_fk int not null,
ADD foreign key(endereco_aluno_fk) references endereco(id);

ALTER TABLE aluno
MODIFY cpf bigint(12) primary key not null;

ALTER TABLE aluno
DROP COLUMN endereco_aluno_fk;

create table endereco(
	id int not null primary key auto_increment,
    rua varchar(100) not null,
    numero varchar(10),
    cep varchar(11),
    bairro varchar(100)
);

INSERT INTO endereco (rua, numero, cep, bairro)
VALUES ('rua das caveiras', '257', '76539-000', 'vila_boa');


SELECT * FROM aluno;
SELECT * FROM endereco;
		