create database testeifma;

use testeifma;

create table endereco (
	id int not null primary key auto_increment,
    cep varchar(11),
    rua varchar(25) not null, 
    bairro varchar(50) not null
);

create table aluno (
	cpf bigint not null primary key,
    nome varchar(50) not null, 
    idade int not null,
    aluno_endereco_fk int not null,                                  /*fk*/
    foreign key(aluno_endereco_fk) references endereco(id)                       /*relação*/
);

insert into endereco values(1, "54940000", "Rua dos ipês", "extrema");

insert into endereco(cep, rua, bairro)
	values("65940-000", "rua dos ipês", "vila tucum"),
		  ("65324-000", "rua das caveiras", "novo bairro"),
          ("63222-000", "rua das amoras", "nova tresidela"),
          ("33333-666", "rua do pacheco", "california");
          
INSERT INTO aluno(cpf, nome, idade, aluno_endereco_fk)
VALUES ('23455675690', 'Lana Del Rey', 32, 5);

UPDATE endereco
	SET rua = 'rua das aleluias'
WHERE rua = "rua dos ipês";
          
		
Delete from endereco
	where rua = "rua das caveiras";


select * from endereco;

select * from aluno
    

    