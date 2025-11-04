USE assicurati

CREATE TABLE auto1(
    Targa VARCHAR(8),
    Marca VARCHAR(16), 
    Cilindarta INT,
    Potenza INT,
    CodF VARCHAR(16),
    CodAss VARCHAR(16)
)

SELECT * FROM assicurazioni

SELECT * FROM proprietari

SELECT * FROM auto1

INSERT INTO auto1 VALUES("PZ104GC", "TOYOTA", 2000, 121, "PZDMTT", "DHSFJU")

INSERT INTO proprietari (CodF, Nome, Residenza) VALUES
('RSSMRA85M01H501Z', 'Mario Rossi', 'Via Roma 12'),
('VRDLGI72A45F205Y', 'Luigi Verdi', 'Corso Italia 33'),
('BNCLRA60T70H703X', 'Laura Bianchi', 'Piazza Duomo 5'),
('FRNCST91P12D612W', 'Cristina Ferri', 'Viale Libertà 99'),
('LNZGPP78S22C351U', 'Giuseppe Lenzi', 'Via Manzoni 101'),
('BRTPLC90E15L219R', 'Paolo Bartoli', 'Via Venezia 87'),
('GRNRNT66B08Z404F', 'Renato Gerni', 'Via Dante 44'),
('MLCFRN80H29M126Q', 'Francesca Malchi', 'Via Verdi 56'),
('TSTFNC95C01H501L', 'Nicola Testa', 'Viale Europa 78'),
('ZNCLRA85M12H703J', 'Lara Zanchi', 'Via Firenze 100');

INSERT INTO assicurazioni (CodAss, Nome, Sede) VALUES
('POLZ0001ABCD1234', 'Vita Sicura', 'Via Libertà 15, Milano'),
('POLZ0002EFGH5678', 'Auto Protetta', 'Corso Italia 200, Torino'),
('POLZ0003IJKL9012', 'Casa Serena', 'Via Roma 10, Firenze'),
('POLZ0004MNOP3456', 'Salute Plus', 'Viale Europa 77, Bologna'),
('POLZ0005QRST7890', 'Viaggio Tranquillo', 'Via Napoli 34, Napoli'),
('POLZ0006UVWX1235', 'Proteggi Famiglia', 'Via Garibaldi 5, Genova'),
('POLZ0007YZAB6789', 'Sicura Impresa', 'Piazza Verdi 8, Palermo'),
('POLZ0008CDEF2345', 'Salute Premium', 'Via Dante 66, Bari'),
('POLZ0009GHIJ6781', 'Auto Full Cover', 'Corso Venezia 45, Verona'),
('POLZ0010KLMN9876', 'Casa Protetta', 'Viale Lombardia 12, Catania');

INSERT INTO auto (Targa, Marca, Cilindrata, Potenza, CodF, CodAss) VALUES
('AB123CD', 'Fiat Panda', 1200, 69, 'RSSMRA85M01H501Z', 'POLZ0001ABCD1234'),
('CD456EF', 'Volkswagen Golf', 1600, 105, 'VRDLGI72A45F205Y', 'POLZ0002EFGH5678'),
('EF789GH', 'Ford Fiesta', 1400, 90, 'BNCLRA60T70H703X', 'POLZ0003IJKL9012'),
('GH012IJ', 'BMW Serie 1', 2000, 150, 'FRNCST91P12D612W', 'POLZ0004MNOP3456'),
('IJ345KL', 'Audi A3', 1800, 140, 'LNZGPP78S22C351U', 'POLZ0005QRST7890'),
('KL678MN', 'Renault Clio', 1300, 75, 'BRTPLC90E15L219R', 'POLZ0006UVWX1235'),
('MN901OP', 'Toyota Yaris', 1000, 69, 'GRNRNT66B08Z404F', 'POLZ0007YZAB6789'),
('OP234QR', 'Mercedes A200', 1600, 122, 'MLCFRN80H29M126Q', 'POLZ0008CDEF2345'),
('QR567ST', 'Peugeot 208', 1200, 82, 'TSTFNC95C01H501L', 'POLZ0009GHIJ6781'),
('ST890UV', 'Alfa Romeo Giulia', 2200, 190, 'ZNCLRA85M12H703J', 'POLZ0010KLMN9876');

SELECT Targa, Marca FROM auto1 WHERE Cilindrata > 2000 OR Potenza > 120

SELECT Nome, Targa FROM proprietari INNER JOIN auto1 ON CodF.proprietari = CodF.auto WHERE auto1.Clindarta > 2000 OR Potenza > 120

SELECT Nome, Targa FROM proprietari INNER JOIN auto1 ON CodF.proprietari = CodF.auto INNER JOIN assicurazioni ON assicurazioni.CodAss = auto1.CodAss WHERE auto1.Clindarta > 2000 OR Potenza > 120 AND assicurazioni.Nome = "SARA"

SELECT Nome, Sede COUNT(CodAss) FROM assicurazioni INNER JOIN auto1 ON CodAss.auto1 = auto1.CodAss
