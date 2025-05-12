create database fishing_database;
use fishing_database;

create table projeto (
id_projeto int not null auto_increment,
titulo_projeto varchar(45) not null,
descricao_projeto varchar(255) not null,
img_projeto longblob not null,
primary key (id_projeto)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

create table empresa (
id_empresa int not null auto_increment,
nome_empresa varchar(45) not null,
cnpj_empresa varchar(45) not null,
email_empresa varchar(45) not null,
senha_empresa varchar(45) not null,
telefone_empresa varchar(45) not null,
primary key (id_empresa)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

create table pessoa (
id_pessoa int not null auto_increment,
nome_pessoa varchar(45) not null,
cpf_pessoa varchar(45) not null,
email_pessoa varchar(45) not null,
senha_pessoa varchar(45) not null,
telefone_pessoa varchar(45) not null,
primary key (id_pessoa)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

create table autoria (
id_autoria int not null auto_increment,
id_pessoa_fk int not null,
id_empresa_fk int not null,
id_projeto_fk int not null,
primary key (id_autoria),
foreign key (id_pessoa_fk) references pessoa (id_pessoa),
foreign key (id_empresa_fk) references empresa (id_empresa),
foreign key (id_projeto_fk) references projeto (id_projeto)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;