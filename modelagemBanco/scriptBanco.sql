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

create table tbl_produto(
	id_produto int not null auto_increment primary key,
    nome varchar(100) not null,
    preco float not null,
    promocao float not null,
    descricao text not null,
    capa varchar(100) not null,
    destaque boolean not null
);

select * from tbl_produto;

create table tbl_produto_categoria(
	id_produto_categoria int not null auto_increment primary key,
    id_produto int not null,
    id_categoria int not null,
    constraint fk_produto_produto_categoria
    foreign key(id_produto)
    references tbl_produto(id_produto),
	constraint fk_categoria_produto_categoria
    foreign key(id_categoria)
    references tbl_categoria(id_categoria)
);

select * from tbl_produto_categoria;

select id_categoria from tbl_produto_categoria
    where id_produto = 4 and id_categoria = 6 limit 1;
    
    select tbl_produto.*, tbl_categoria.nome as categoria from tbl_produto inner join tbl_produto_categoria
            on tbl_produto.id_produto = tbl_produto_categoria.id_produto inner join tbl_categoria
            on tbl_categoria.id_categoria = tbl_produto_categoria.id_categoria where 
            tbl_produto.nome like '%Crash%'