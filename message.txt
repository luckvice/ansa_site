CREATE TABLE usuario (
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_nivel INT NOT NULL,
	nome VARCHAR(64) NOT NULL,
	login VARCHAR(32) NOT NULL,
	senha VARCHAR(64) NOT NULL,
	email VARCHAR(64) NOT NULL,
	telefone VARCHAR(16) NULL,
	cep VARCHAR(12) NULL,
	avatar LONGBLOB NULL,
	data_cadastro DATETIME,
	data_alteracao DATETIME,
	excluido INT DEFAULT 0,
	privado INT NULL
);



CREATE TABLE ong (
	id_ong INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	avatar LONGBLOB NULL,
	nome VARCHAR(64) NOT NULL,
	site VARCHAR(64) NOT NULL,
	facebook VARCHAR(128) NOT NULL,
	twitter VARCHAR(128) NOT NULL,
	instagram VARCHAR(128) NOT NULL,
	descricao TEXT NULL,
	data_cadastro DATETIME NULL,
	data_alteracao DATETIME NULL,
	excluido INT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);





CREATE TABLE personalidade (
	id_pet INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	docil INT NULL,
	agressivo INT NULL,
	calmo INT NULL,
	brincalhao INT NULL,
	sociavel INT NULL,
	arisco INT NULL,
	independente INT NULL,
	carente INT NULL,
	tenso INT NULL,
	assustado INT NULL,
	casa INT NULL,
	apartamento INT NULL
);

CREATE TABLE saude (
	id_pet INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	vermifugado INT NULL,
	vacinado INT NULL,
	castrado INT NULL,
	cuidados_especiais INT NULL
);

CREATE TABLE porte (
	id_porte INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(16)
);

INSERT INTO porte VALUES (1, 'Pequeno');
INSERT INTO porte VALUES (2, 'Médio');
INSERT INTO porte VALUES (3, 'Grande');

CREATE TABLE especie (
	id_especie INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(16)
);

INSERT INTO especie VALUES (1, 'Cachorro');
INSERT INTO especie VALUES (2, 'Gato');
INSERT INTO especie VALUES (3, 'Outros');

CREATE TABLE sexo (
	id_sexo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(16)
);

INSERT INTO sexo VALUES (1, 'Macho');
INSERT INTO sexo VALUES (2, 'Fêmea');

CREATE TABLE faixa_etaria (
	id_faixa_etaria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(16)
);

INSERT INTO faixa_etaria VALUES (1, 'Filhote');
INSERT INTO faixa_etaria VALUES (2, 'Jovem');
INSERT INTO faixa_etaria VALUES (3, 'Adulto');
INSERT INTO faixa_etaria VALUES (4, 'Idoso');

CREATE TABLE estado (
    id_estado INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_uf INT NOT NULL,
    nome VARCHAR (50) NOT NULL,
    uf CHAR (2)  NOT NULL,
    regiao INT NOT NULL
);

CREATE TABLE municipio (
  id_municipio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  codigo INT NOT NULL,
  nome VARCHAR(255) NOT NULL,
  uf CHAR(2) NOT NULL
);


CREATE TABLE nivel (
	id_nivel INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao CHAR(2)
);

INSERT INTO nivel VALUES (1, 'Admin');
INSERT INTO nivel VALUES (2, 'Pessoa Física');
INSERT INTO nivel VALUES (3, 'ONG');
INSERT INTO nivel VALUES (4, 'Veterinário');

CREATE TABLE acesso (
	id_acessp INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	data DATETIME NULL,
	ip VARCHAR(64) NULL
);

CREATE TABLE pet (
	id_pet INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(32) NOT NULL,
	id_usuario INT NOT NULL,
	descricao TEXT NULL,
	adotado INT NULL DEFAULT 0,
	id_porte INT NULL,
	id_especie INT NULL,
	id_sexo INT NULL,
	id_faixa_etaria INT NULL,
	id_estado INT NULL,
	id_municipio INT NULL,
	data_cadastro DATETIME NULL,
	data_alteracao DATETIME NULL,
	excluido INT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
	FOREIGN KEY (id_porte) REFERENCES porte(id_porte),
	FOREIGN KEY (id_especie) REFERENCES especie(id_especie),
	FOREIGN KEY (id_sexo) REFERENCES sexo(id_sexo),
	FOREIGN KEY (id_faixa_etaria) REFERENCES faixa_etaria(id_faixa_etaria),
	FOREIGN KEY (id_estado) REFERENCES estado(id_estado),
	FOREIGN KEY (id_municipio) REFERENCES municipio(id_municipio)
);

CREATE TABLE galeria (
	id_galeria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_pet INT NOT NULL,
	imagem LONGBLOB NULL,
	capa INT NULL,
	FOREIGN KEY (id_pet) REFERENCES pet(id_pet)
);

CREATE TABLE depoimento (
	id_depoimento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_pet INT NOT NULL,
	id_usuario INT NOT NULL,
	depoimento TEXT NULL,
	FOREIGN KEY (id_pet) REFERENCES pet(id_pet),
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);