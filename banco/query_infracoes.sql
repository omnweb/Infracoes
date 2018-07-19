CREATE DATABASE infracoes

CREATE TABLE menu
(
	id_menu INT NOT NULL AUTO_INCREMENT,
	link VARCHAR(80) NOT NULL,
	nome VARCHAR(100) NOT NULL,
	PRIMARY KEY(id_menu)
)

CREATE TABLE perfil
(
	id_perfil INT NOT NULL AUTO_INCREMENT,
	descritivo VARCHAR(50) NOT NULL,	
	PRIMARY KEY(id_perfil)
)

CREATE TABLE acesso
(
	id_acesso INT NOT NULL AUTO_INCREMENT,
	id_menu INT NOT NULL,
	id_perfil INT NOT NULL,
	descritivo VARCHAR(50) NOT NULL,	
	PRIMARY KEY(id_acesso),
	FOREIGN KEY (id_menu) REFERENCES menu (id_menu),
	FOREIGN KEY (id_perfil) REFERENCES perfil (id_perfil)
)

CREATE TABLE usuario
(
	id_usuario INT NOT NULL AUTO_INCREMENT,	
	id_perfil INT NOT NULL,
	status_user BOOLEAN NOT NULL,	
	nome VARCHAR(80) NOT NULL,
	email VARCHAR(100) NOT NULL,
	senha VARCHAR(15) NOT NULL,
	PRIMARY KEY(id_usuario),	
	FOREIGN KEY (id_perfil) REFERENCES perfil (id_perfil)
)

CREATE TABLE veiculo
(
	id_veiculo INT NOT NULL AUTO_INCREMENT,	
	id_usuario INT NOT NULL,
	status_veic BOOLEAN NOT NULL,	
	marca VARCHAR(80) NOT NULL,
	placa CHAR(10) NOT NULL,	
	PRIMARY KEY(id_veiculo),	
	FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
)

CREATE TABLE infracao
(
	id_infracao INT NOT NULL AUTO_INCREMENT,	
	descritivo VARCHAR(100) NOT NULL,
	pontos INT NOT NULL,	
	PRIMARY KEY(id_infracao)	
)

CREATE TABLE denuncia
(
	id_denuncia INT NOT NULL AUTO_INCREMENT,
	id_veiculo INT NOT NULL,
	id_infracao INT NOT NULL,
	datad DATE NOT NULL,	
	PRIMARY KEY(id_denuncia),
	FOREIGN KEY (id_veiculo) REFERENCES veiculo (id_veiculo),
	FOREIGN KEY (id_infracao) REFERENCES infracao (id_infracao)
)


infracoes
INSERT INTO menu(link, nome) VALUES ("lista.veiculo.php","Fulano")

INSERT INTO perfil( descritivo) VALUES ("Administrador"), ("Usuario")

INSERT INTO acesso (id_menu, id_perfil) VALUES (1,1), (2,2)

INSERT INTO usuario(id_perfil, status_user, nome, email, senha) 
VALUES  (1, 1, "Neto", "neto@teste.com", "1212"), 
	(2, 1, "Fulano", "fulano@teste.com", "2121"),
	(2, 1, "Beltrano", "beltrano@teste.com", "1122"), 
	(2, 1, "Ciclano", "ciclano@teste.com", "2211")
	


INSERT INTO veiculo(id_usuario, status_veic, marca, placa) 
VALUES  
	(2, 1, "Iveco","STF-0171"),
	(3, 1, "Mercedes","URV-0000"), 
	(4, 1, "Volvo", "NET- 2002")


INSERT INTO infracao(descritivo, pontos) 
VALUES  
	("Envolvimento em acidente", 15),
	("Direção perigosa", 10),
	("Excesso de velocidade", 5),
	("Ultrapasagem perigosa", 7)
	
INSERT INTO denuncia(id_veiculo, id_infracao, datad) 
VALUES  
	(1, 3, "2017-06-14"),
	(2, 4, "2017-14-06"),
	(2, 1, "2017-14-05")
	
	
CREATE OR REPLACE VIEW vw_denuncias AS 
SELECT u.nome, v.marca, d.datad, i.descritivo, SUM(i.pontos) "pontos" 
FROM denuncia d 
INNER JOIN veiculo v ON (d.id_veiculo = v.id_veiculo) 
INNER JOIN usuario u ON (u.id_usuario = v.id_usuario) 
INNER JOIN infracao i ON (i.id_infracao = d.id_infracao) 
GROUP BY d.id_denuncia
	
CREATE OR REPLACE VIEW vw_ranking AS 
SELECT u.nome, COUNT(i.pontos) "infracoes", SUM(i.pontos) "pontuacao" 
FROM denuncia d 
INNER JOIN veiculo v ON (d.id_veiculo = v.id_veiculo) 
INNER JOIN usuario u ON (u.id_usuario = v.id_usuario) 
INNER JOIN infracao i ON (i.id_infracao = d.id_infracao) 
GROUP BY u.id_usuario
ORDER BY SUM(i.pontos) DESC

INSERT INTO veiculo(id_usuario, status_veic, marca, placa) VALUES(2,2,"Ford","NDI-1234")

