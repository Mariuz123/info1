CREATE DATABASE StudentiCorsidiLaurea;

USE StudentiCorsidiLaurea;

CREATE TABLE CorsidiLaurea (
    CorsodiLaurea VARCHAR(32),
    TipodiLaurea VARCHAR(32),
    Facolta VARCHAR(32),
    PRIMARY KEY(CorsodiLaurea)
);

CREATE TABLE Docenti(
    CodDocente INT AUTO_INCREMENT NOT NULL,
    NomeD VARCHAR(16),
    Dipartimento VARCHAR(32),
    PRIMARY KEY (CodDocente)
);

CREATE TABLE Studenti(
    Matricola INT AUTO_INCREMENT NOT NULL,
    NomeS VARCHAR(16),
    CorsodiLaurea VARCHAR(32),
    AnnoN YEAR,
    PRIMARY KEY(Matricola),
    FOREIGN KEY(CorsodiLaurea) REFERENCES CorsidiLaura(CorsodiLaurea)
);

CREATE TABLE Corsi(
    CodiceCorso INT AUTO_INCREMENT NOT NULL,
    NomeCorso VARCHAR(32),
    CodDocente INT,
    PRIMARY KEY(CodiceCorso, CodDocente),
    Foreign Key (CodDocente) REFERENCES Docenti(CodDocente)
);

CREATE TABLE Frequenta(
    Matricola INT,
    CodiceCorso INT,
    PRIMARY KEY(Matricola, CodiceCorso),
    Foreign Key (Matricola) REFERENCES Studenti(Matricola),
    Foreign Key (CodiceCorso) REFERENCES Corsi(CodiceCorso)
);

INSERT INTO CorsidiLaurea (CorsodiLaurea, TipodiLaurea, Facolta) VALUES 
('Programmazione', 'L', 'Informatica');

INSERT INTO CorsidiLaurea (CorsodiLaurea, TipodiLaurea, Facolta) VALUES
('SBC', 'L', 'Informatica'),
('Letteratura', 'L', 'Lettere e Filosofia'),
('Filosofia', 'LM', 'Lettere e Filosofia');

INSERT INTO Docenti (NomeD, Dipartimento) VALUES
('Felice', 'Informatica'),
('Leoni', 'Informatica'),
('Rossi', 'Lettere'),
('Bianchi', 'Informatica'),
('Verdi', 'Filosofia');

INSERT INTO Studenti (NomeS, CorsodiLaurea, AnnoN) VALUES
('Marco', 'SBC', 2000),
('Lucia', 'SBC', 1999),
('Giulia', 'Programmazione', 2001),
('Paolo', 'Programmazione', 1998),
('Anna', 'Letteratura', 2002),
('Marta', 'Letteratura', 2001),
('Luca', 'Filosofia', 1997),
('Sara', 'Filosofia', 2000);

INSERT INTO Corsi (NomeCorso, CodDocente) VALUES
('Basi di Dati e Sistemi Informativi', 1), 
('Informatica Generale', 2),               
('Letteratura Italiana', 3),               
('Filosofia Morale', 5),                   
('Algoritmi', 4),                          
('Programmazione 1', 2);  

INSERT INTO Frequenta (Matricola, CodiceCorso) VALUES
(1, 1),(1, 2),(2, 1),(3, 5),(3, 6),(4, 6),(5, 3),(6, 3),(7, 4),(8, 4),(8, 3);

SELECT NomeS, AnnoN FROM Studenti
WHERE CorsodiLaurea = 'SBC' ORDER BY NomeS;

SELECT NomeD, Dipartimento FROM docenti
INNER JOIN Corsi USING(CodDocente)
WHERE Corsi.NomeCorso = 'Basi di Dati e Sistemi Informativi' OR Corsi.NomeCorso = 'Informatica Generale';

SELECT Matricola, NomeS FROM Studenti
INNER JOIN CorsidiLaurea USING(CorsodiLaurea)
INNER JOIN Frequenta USING(Matricola)
INNER JOIN Corsi ON Frequenta.CodiceCorso=Corsi.CodiceCorso
INNER JOIN Docenti ON Corsi.CodDocente=Docenti.CodDocente
WHERE CorsidiLaurea.TipodiLaurea = 'L' AND Docenti.NomeD = 'Felice';

SELECT TipodiLaurea, AVG(AnnoN) FROM CorsidiLaurea
INNER JOIN Studenti USING(CorsodiLaurea);

SELECT CodiceCorso, COUNT(Matricola) FROM Frequenta
INNER JOIN Corsi USING(CodiceCorso)
INNER JOIN Docenti ON Corsi.CodDocente=Docenti.CodDocente
WHERE Docenti.NomeD='Leoni';

SELECT CodiceCorso FROM 