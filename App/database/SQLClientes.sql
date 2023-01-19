create database api_clientes;

use api_clientes;

create table clientes(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    idade INT NOT NULL
);

INSERT INTO clientes(nome, idade) values("joao", 23);
INSERT INTO clientes(nome, idade) values("lucas", 14);
INSERT INTO clientes(nome, idade) values("kessia", 21);
INSERT INTO clientes(nome, idade) values("ana", 15);

DELETE FROM clientes WHERE id = 2;

SELECT * FROM clientes;

INSERT INTO clientes(nome, idade) VALUES("lucas22",23);