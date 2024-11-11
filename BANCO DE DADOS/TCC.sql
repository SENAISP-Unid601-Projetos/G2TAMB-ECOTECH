CREATE DATABASE ECOTECH;

CREATE TABLE USUARIO (
    ID SERIAL PRIMARY KEY,
    NOME VARCHAR(100) NOT NULL,
	DATA_NASCIMENTO DATE NOT NULL,
	TELEFONE VARCHAR(11) NOT NULL,
    EMAIL VARCHAR(100) UNIQUE NOT NULL,
    BIOGRAFIA VARCHAR(200),
	NOME_USUARIO VARCHAR(100),
	FOTO VARCHAR(500), 
	SENHA VARCHAR(200) NOT NULL,
	TIPO_CONTA VARCHAR(50) NOT NULL
);

CREATE TABLE EMPRESA(
	CNPJ VARCHAR(20) PRIMARY KEY,
	EMAIL VARCHAR(100) NOT NULL,
	DATA_INAUGURACAO DATE NOT NULL,
	SENHA VARCHAR(200) NOT NULL,
	NOME VARCHAR(100) NOT NULL,
	TELEFONE VARCHAR(100) NOT NULL
);

CREATE TABLE ADMINISTRADOR(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(100) NOT NULL,
	EMAIL VARCHAR(100) NOT NULL,
	TELEFONE VARCHAR(100) NOT NULL,
	SENHA VARCHAR(200) NOT NULL
);

CREATE TABLE POST(
	ID SERIAL PRIMARY KEY,
	FOTO VARCHAR(500) NOT NULL, 
	DESCRICAO TEXT, 
	COMENTARIO VARCHAR(200),
	CURTIDA INTEGER,
	FK_ID_USUARIO INTEGER,
	FK_CNPJ_EMPRESA VARCHAR(20),
	FOREIGN KEY (FK_ID_USUARIO) REFERENCES USUARIO(ID),
	FOREIGN KEY (FK_CNPJ_EMPRESA) REFERENCES EMPRESA(CNPJ)
);

CREATE TABLE COLETA(
	ID SERIAL PRIMARY KEY,
	LOCALIZACAO VARCHAR(200) NOT NULL,
	NOME VARCHAR(100) NOT NULL,
	FOTO VARCHAR(500) NOT NULL,
	DESCRICAO TEXT,
	STATUS CHAR NOT NULL,
	FK_CNPJ_EMPRESA VARCHAR(20),
	FOREIGN KEY (FK_CNPJ_EMPRESA) REFERENCES EMPRESA(CNPJ)
);

CREATE TABLE DENUNCIA(
	ID SERIAL PRIMARY KEY,
	ENDERECO VARCHAR(100) NOT NULL,
	DATA DATE NOT NULL,
	HORA TIME NOT NULL,
	FK_ID_USUARIO INTEGER,
	FK_CNPJ_EMPRESA VARCHAR(20),
	FOREIGN KEY (FK_ID_USUARIO) REFERENCES USUARIO(ID),
	FOREIGN KEY (FK_CNPJ_EMPRESA) REFERENCES EMPRESA(CNPJ)
);

CREATE TABLE DENUNCIA_ADMINISTRADOR(
	ID SERIAL PRIMARY KEY,
	FK_ID_DENUNCIA INTEGER,
	FK_ID_ADM_ADMINISTRADOR INTEGER,
	FOREIGN KEY (FK_ID_DENUNCIA) REFERENCES DENUNCIA(ID),
	FOREIGN KEY (FK_ID_ADM_ADMINISTRADOR) REFERENCES ADMINISTRADOR(ID)
);

alter table post
alter column foto type varchar(500);

alter table usuario
alter column foto type varchar(500);

alter table coleta
alter column foto type varchar(500);

CREATE TABLE CURTIDAS_POSTS(
	ID SERIAL PRIMARY KEY,
	FK_ID_POST INTEGER,
	FK_ID_USUARIO INTEGER,
	FK_CNPJ_EMPRESA VARCHAR(20),
	FOREIGN KEY (FK_ID_POST) REFERENCES POST (ID),
	FOREIGN KEY (FK_ID_USUARIO) REFERENCES USUARIO (ID),
	FOREIGN KEY (FK_CNPJ_EMPRESA) REFERENCES EMPRESA (CNPJ)
);

ALTER TABLE curtidas_posts
DROP CONSTRAINT curtidas_posts_fk_cnpj_empresa_fkey;

ALTER TABLE POST
    ADD CONSTRAINT curtidas_posts_fk_cnpj_empresa_fkey
    FOREIGN KEY (fk_cnpj_empresa)
    REFERENCES empresa(cnpj)
    ON DELETE CASCADE;
	
ALTER TABLE curtidas_posts
DROP CONSTRAINT curtidas_posts_fk_id_post_fkey;

ALTER TABLE curtidas_posts
    ADD CONSTRAINT curtidas_posts_fk_id_post_fkey
    FOREIGN KEY (fk_id_post)
    REFERENCES post(id)
    ON DELETE CASCADE;

ALTER TABLE curtidas_posts
DROP CONSTRAINT curtidas_posts_fk_id_usuario_fkey;

ALTER TABLE curtidas_posts
    ADD CONSTRAINT curtidas_posts_fk_id_usuario_fkey
    FOREIGN KEY (fk_id_usuario)
    REFERENCES usuario(id)
    ON DELETE CASCADE;

ALTER TABLE POST
DROP CONSTRAINT post_fk_cnpj_empresa_fkey;

ALTER TABLE POST
    ADD CONSTRAINT post_fk_cnpj_empresa_fkey
    FOREIGN KEY (fk_cnpj_empresa)
    REFERENCES empresa(cnpj)
    ON DELETE CASCADE;
	
ALTER TABLE POST
DROP CONSTRAINT post_fk_id_usuario_fkey;

ALTER TABLE POST
    ADD CONSTRAINT post_fk_id_usuario_fkey
    FOREIGN KEY (fk_id_usuario)
    REFERENCES usuario(id)
    ON DELETE CASCADE;