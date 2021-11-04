use dbpincerugames;

show tables;

create table tbl_usuario(
	id_usuario int not null auto_increment primary key,
    nome varchar(100) not null,
    login varchar(100) not null,
    senha varchar(20) not null
);

select * from tbl_categoria;

alter table tbl_usuario modify column senha varchar(70)  not null;

desc tbl_usuario;

select * from tbl_usuario;

create table tbl_contato(
	id_contato int not null auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100),
    celular varchar(15) not null,
    unique index(id_contato)
);

select * from tbl_contato;