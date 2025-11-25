CREATE DATABASE LezioniECorsi;

USE LezioniECorsi;

CREATE TABLE Aule(
    AulaID INT AUTO_INCREMENT NOT NULL,
    NPosti INT,
    Edifici VARCHAR(4),
    Lavagna BOOLEAN,
    NCalcolatori INT,
    PRIMARY KEY (AulaID)
);

CREATE TABLE Corso(
    CorsoID INT AUTO_INCREMENT NOT NULL,
    Nome VARCHAR(32),
    Docente VARCHAR(32),
    PRIMARY KEY(CorsoID)
);

CREATE TABLE Lezioni(
    LezioneID INT AUTO_INCREMENT NOT NULL,
    hInizio TIME,
    hFine TIME,
    Giorno VARCHAR(16),
    Semestre VARCHAR(32),
    AulaID INT NOT NULL,
    CorsoID INT NOT NULL,
    PRIMARY KEY(LezioneID),
    Foreign Key (AulaID) REFERENCES (Aule),
    Foreign Key (CorsoId) REFERENCES (Corso)
);

