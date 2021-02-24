Create TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(100) NOT NULL,
  lastName VARCHAR(100) NOT NULL,
  dataNasc DATETIME,
  email VARCHAR(250) not NULL,
  emailConfirmado BOOLEAN,
  #string para confirmar a conta no email
  emailConfirmar VARCHAR(250),
  nickname VARCHAR(250),
  pass VARCHAR(255) NOT NULL,
  #contar Recuperacao de pass
  passRecuperada int,
  #string para recuperar
  passRecuperacaoToken VARCHAR(250),
  #Ativo, desativo, bloqueado
  estado int,
  #admin, Cozinheiro, outro
  tipo int DEFAULT 0,
  img VARCHAR(250),
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS categoriaReceitas(
	id int NOT NULL  AUTO_INCREMENT,
	nome varchar(250),
	PRIMARY KEY (id)
);


CREATE TABLE receitas(
  id int NOT NULL  AUTO_INCREMENT,
  id_user int NOT NULL,
  nome VARCHAR(250) NOT NULL,
  `desc` VARCHAR(255),
  duracao FLOAT,
  n_pessoas INT,
  preco FLOAT,
  `data` timestamp,
  #0 a 5 criar Enum
  dificuldade int,
  id_categoria int,
  PRIMARY KEY (id),
  FOREIGN KEY (id_user) REFERENCES users(id),
  FOREIGN KEY (id_categoria) REFERENCES categoriaReceitas(id)
);

CREATE TABLE IF NOT EXISTS metrica(
	id int not null AUTO_INCREMENT,
	id_receita int not null,
	id_user int not null,
	`data` timestamp,
	PRIMARY KEY (id),
	FOREIGN KEY (id_receita) REFERENCES receitas(id),
	FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE ingredientes(
  id int NOT NULL  AUTO_INCREMENT,
  nome VARCHAR(150),
  PRIMARY KEY (id)
);


CREATE TABLE ingredientes_Receitas(
  id_receitas int NOT NULL,
  id_ingredientes int NOT NULL,
  quantidade int,
  PRIMARY KEY (id_receitas, id_ingredientes),
  FOREIGN KEY (id_receitas) REFERENCES receitas (id),
  FOREIGN KEY (id_ingredientes) REFERENCES ingredientes(id)
);


CREATE TABLE receitasImagens(
  id int NOT NULL AUTO_INCREMENT,
  id_receita int NOT NULL,
  `desc` VARCHAR(250),
  url VARCHAR(250),
  PRIMARY KEY (id),
  FOREIGN KEY (id_receita) REFERENCES receitas (id)
);