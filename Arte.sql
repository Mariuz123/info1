-- Active: 1761293643617@@127.0.0.1@3306
CREATE DATABASE NationaGallery;
USE NationaGallery;
CREATE TABLE Musei(
    NomeM VARCHAR(16),
    Citta VARCHAR(32),
    PRIMARY KEY (NomeM)
);
CREATE TABLE Artisti(
    NomeA VARCHAR(16),
    Nazionalita VARCHAR(16),
    PRIMARY KEY (NomeA)
);
CREATE TABLE Opere(
    Codice VARCHAR(16),
    Titolo VARCHAR(16),
    NomeM VARCHAR(16),
    NomeA VARCHAR(16),
    PRIMARY KEY (Codice),
    FOREIGN KEY(NomeM) REFERENCES Musei(NomeM),
    FOREIGN KEY(NomeA) REFERENCES Artisti(NomeA)
);
CREATE TABLE Personaggi(
    ID_Personaggio INT AUTO_INCREMENT NOT NULL,
    Personaggio VARCHAR(32),
    Codice VARCHAR(16),
    FOREIGN KEY(Codice) REFERENCES Opere(Codice),
    PRIMARY KEY(ID_Personaggio)
);
INSERT INTO Musei (NomeM, Citta) VALUES
('Uffizi', 'Firenze'),
('Louvre', 'Parigi'),
('Prado', 'Madrid'),
('MOMA', 'New York'),
('Hermitage', 'San Pietroburgo');
INSERT INTO Artisti (NomeA, Nazionalita) VALUES
('Leonardo', 'Italiana'),
('Michelangelo', 'Italiana'),
('Picasso', 'Spagnola'),
('Monet', 'Francese'),
('VanGogh', 'Olandese');
INSERT INTO Opere(Codice, Titolo, NomeM, NomeA) VALUES
('O001', 'Gioconda', 'Louvre', 'Leonardo'),
('O002', 'David', 'Uffizi', 'Michelangelo'),
('O003', 'Guernica', 'Prado', 'Picasso'),
('O004', 'Ninfee', 'MOMA', 'Monet'),
('O005', 'Girasoli', 'Hermitage', 'VanGogh');
INSERT INTO Personaggi (Personaggio, Codice) VALUES
('Monna Lisa', 'O001'),
('Davide', 'O002'),
('Civili in guerra', 'O003'),
('Donna con ombrello', 'O004'),
('Fiori di girasole', 'O005');

INSERT INTO Musei (NomeM, Citta) VALUES
('NationalGallery', 'Londra');

INSERT INTO Artisti (NomeA, Nazionalita) VALUES
('Tiziano', 'Italiana');

INSERT INTO Opere(Codice, Titolo, NomeM, NomeA) VALUES
('O006', 'La Madonna', 'NationalGallery', 'Tiziano')

INSERT INTO Artisti (NomeA, Nazionalita) VALUES
('Caravaggio', 'Italiana')

INSERT INTO Opere(Codice, Titolo, NomeM, NomeA) VALUES
('O007', 'Esdrongo', 'Uffizi', 'Caravaggio')

SELECT Codice, Titolo FROM Opere O
INNER JOIN Artisti USING(NomeA)
INNER JOIN Musei USING(NomeM)
WHERE Artisti.NomeA = "Tiziano" AND O.NomeM = "NationalGallery";

SELECT NomeA, Titolo FROM Opere
INNER JOIN Musei USING(NomeM)
WHERE Musei.NomeM = 'Uffizi' OR Musei.NomeM = 'NationalGallery';

SELECT NomeA, Titolo FROM Opere
INNER JOIN Musei USING(NomeM)
WHERE Musei.Citta = 'Firenze';

SELECT Citta FROM Musei
INNER JOIN Opere USING(NomeM)
WHERE Opere.NomeA = 'Caravaggio';

SELECT Codice, Titolo FROM Opere
INNER JOIN Artisti USING(NomeA)
INNER JOIN Musei USING(NomeM)
WHERE Artisti.NomeA = "Tiziano" AND Musei.Citta = 'Londra';

SELECT NomeA, Titolo FROM Opere
INNER JOIN Artisti USING(NomeA)
INNER JOIN Musei USING(NomeM)
WHERE Artisti.Nazionalita = 'Spagnola' AND Musei.Citta = 'Firenze';

SELECT Codice, Titolo FROM Opere
INNER JOIN Artisti USING(NomeA)
INNER JOIN Musei USING(NomeM)
INNER JOIN Personaggi USING(Codice)
WHERE Musei.Nazionalita = 'Italiana' AND Musei.Citta = 'Londra' AND Personaggi.Personaggio = 'Madonna';

SELECT COUNT(Codice) FROM Opere
INNER JOIN Artisti USING(NomeA)
INNER JOIN Musei USING(NomeM)
WHERE Musei.Citta = 'Londra' AND Artisti.Nazionalita = 'Italiana'