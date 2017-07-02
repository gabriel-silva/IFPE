CREATE DATABASE IFPE;
USE IFPE;

CREATE TABLE ADMIN(
	ID INTEGER NOT NULL AUTO_INCREMENT,
	MATRICULA VARCHAR(15) NOT NULL,
	NOME VARCHAR(70) NOT NULL,
	SENHA VARCHAR(255) NOT NULL,
	CONSTRAINT ID_PK PRIMARY KEY (ID)
);


CREATE TABLE FUNCIONARIO(
	ID INTEGER NOT NULL AUTO_INCREMENT,
	MATRICULA VARCHAR(15) NOT NULL,
	NOME VARCHAR(70) NOT NULL,
	SENHA VARCHAR(255) NOT NULL,
	CONSTRAINT ID_PK PRIMARY KEY (ID)
);

CREATE TABLE ESTUDANTE(

	ID INTEGER NOT NULL AUTO_INCREMENT,
	MATRICULA VARCHAR(15) NOT NULL,
	NOME VARCHAR(70) NOT NULL,
	CONSTRAINT ID_PK PRIMARY KEY (ID)

);

CREATE TABLE REGISTRO(

	ID INTEGER NOT NULL AUTO_INCREMENT,
	DATA DATE NOT NULL,
	CONSTRAINT ID_PK PRIMARY KEY(ID)

);

CREATE TABLE ENTRADA_DO_ALUNO(

	ID INTEGER NOT NULL AUTO_INCREMENT,
	NUM_ENTRADA INTEGER NOT NULL,
    ENTRADA_ESTUDANTE INTEGER,
    ENTRADA_REGISTRO INTEGER,
	CONSTRAINT ID_PK PRIMARY KEY(ID),
    CONSTRAINT ENTRADA_ESTUDANTE_FK FOREIGN KEY 
    (ENTRADA_ESTUDANTE) REFERENCES ESTUDANTE(ID),
	CONSTRAINT ENTRADA_REGISTRO_FK FOREIGN KEY 
    (ENTRADA_REGISTRO) REFERENCES REGISTRO(ID)

);



INSERT INTO ADMIN(MATRICULA, NOME, SENHA) VALUES ("20161INFIG0170", "Gabriel", "123");
