CREATE DATABASE tuttiinforma;
USE tuttiinforma;
CREATE TABLE soci(
    NTessera INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(16) NOT NULL,
    cognome VARCHAR(16) NOT NULL,
    indirizzo VARCHAR(16) NOT NULL,
    dataDiNascita DATE NOT NULL,
    professione VARCHAR(16) NOT NULL,
    PRIMARY KEY(NTessera)
);

CREATE TABLE atleti(
    NTessera INT NOT NULL,
    vistaMedica DATE NOT NULL,
    dataTessera DATE NOT NULL,
    tipo INT,
    Foreign Key (NTessera) REFERENCES soci(NTessera),
    PRIMARY KEY(NTessera),
    Foreign Key (tipo) REFERENCES squadra(idSquad)
);
CREATE TABLE frequentatori(
    NTessera INT NOT NULL,
    NCorsi INT NOT NULL,
    Foreign Key (NTessera) REFERENCES soci(NTessera),
    PRIMARY KEY(NTessera)
);
CREATE TABLE onorari(
    NTessera INT NOT NULL,
    Ruolo VARCHAR(32),
    Foreign Key (NTessera) REFERENCES soci(NTessera),
    PRIMARY KEY(NTessera)
);
CREATE TABLE frequenta(
    NTessera INT NOT NULL,
    codiceCorso INT NOT NULL,
    pagato BOOL,
    Foreign Key (NTessera) REFERENCES soci(NTessera),
    PRIMARY KEY(NTessera),
    Foreign Key (codiceCorso) REFERENCES corsi(codice)
);
CREATE TABLE impianti(
    codice INT AUTO_INCREMENT NOT NULL,
    descript VARCHAR(64),
    indirizzo VARCHAR(64),
    telefono VARCHAR(64),
    ente VARCHAR(32),
    PRIMARY KEY(codice)
);
CREATE TABLE corsi(
    codice INT AUTO_INCREMENT NOT NULL,
    descript VARCHAR(64),
    costo INT NOT NULL,
    giorno VARCHAR(8),
    impianto INT NOT NULL,
    ore INT NOT NULL,
    resposabile INT NOT NULL,
    PRIMARY KEY(codice),
    Foreign Key (impianto) REFERENCES impianti(codice),
    Foreign Key (resposabile) REFERENCES responsabili(idResp)
);
CREATE TABLE responsabili(
    idResp INT AUTO_INCREMENT NOT NULL,
    cf VARCHAR(32),
    nome VARCHAR(32),
    cognome VARCHAR(32),
    telefono VARCHAR(32),
    inidirizzo VARCHAR(32),
    paga INT,
    PRIMARY KEY(idResp)
);
CREATE TABLE squadra(
    idSquad INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(32),
    categoria VARCHAR(32),
    nAtleti INT,
    allenatore INT NOT NULL,
    PRIMARY KEY(idSquad),
    Foreign Key (allenatore) REFERENCES allentori(NTessera)
);
CREATE TABLE allentori(
    NTessera INT AUTO_INCREMENT NOT NULL,
    dataTessera DATE NOT NULL,
    nome VARCHAR(32),
    cognome VARCHAR(32),
    PRIMARY KEY( NTessera)
);
CREATE TABLE loginForm(
    idLogin INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(32),
    cognome VARCHAR(32),
    pwd VARCHAR(32),
    mail VARCHAR(32),
    NTessera INT NOT NULL,
    ruolo BOOL, 
    PRIMARY KEY(idLogin),
    Foreign Key (NTessera) REFERENCES soci(NTessera)
);