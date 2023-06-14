CREATE TABLE IF NOT EXISTs Users (
    ID SERIAL PRIMARY KEY,
    NOM VARCHAR(50),
    PRENOM VARCHAR(50),
    EMAIL VARCHAR(30),
    PASSWORD VARCHAR(16),
    ISADMIN INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS Publication (
    ID SERIAL PRIMARY KEY,
    IDUSERS INT REFERENCES USERS,
    IMG VARCHAR(40),
    TITLE VARCHAR(25),
    DESCRIPTION TEXT,
    DATE TIMESTAMP
);

CREATE TABLE IF NOT EXISTS CommentairePublication (
    ID SERIAL PRIMARY KEY,
    IDUSER INT REFERENCES USERS,
    IDPUBLICATION INT REFERENCES PUBLICATION,
    DESCRIPTION TEXT,
    DATE TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Lieu (
    ID SERIAL PRIMARY KEY,
    NOM VARCHAR(30),
    SUPERFICIE NUMERIC,
    NBPOPULATION INT
);

CREATE TABLE IF NOT EXISTS TypeOffre(
    ID SERIAL PRIMARY KEY,
    NOM VARCHAR(60)
);

CREATE TABLE IF NOT EXISTS Offre(
    ID SERIAL PRIMARY KEY,
    IDUSERS INT REFERENCES USERS,
    TEXTE TEXT,
    DATEPUBLICATION TIMESTAMP,
    DATEDEFINVALIDITE TIMESTAMP,
    IDLIEU INT REFERENCES LIEU,
    IDTYPEOFFRE INT REFERENCES TYPEOFFRE
);

CREATE TABLE IF NOT EXISTS Publicite (
    ID SERIAL PRIMARY KEY,
    TITRE VARCHAR(30),
    DESCRI TEXT,
    FICHIER VARCHAR(50),
    DATEPUBLICITE TIMESTAMP,
    IDUSERS INT REFERENCES USERS
);

CREATE TABLE IF NOT EXISTS CommentairePublicite(
    id SERIAL PRIMARY KEY,
    IDUSERS INT REFERENCES USERS,
    IDPUBLICITE INT REFERENCES PUBLICITE,
    TEXTE TEXT,
    DATECOMMENTAIRE TIMESTAMP
);


---------- 3 DERNIERES OFFRES ----------------
CREATE OR REPLACE VIEW v_3_derniers_offres AS (
    SELECT id, idusers, texte, datePublication FROM offre ORDER BY datePublication DESC LIMIT 3
);

CREATE OR REPLACE VIEW v_publication AS(
    SELECT id, idusers, title, description, img, date FROM publication
);

CREATE OR REPLACE VIEW v_publicite AS(
    SELECT id, idusers, titre, descri, fichier, datepublicite FROM publicite
);


---------- ACTUALITE ---------------
SELECT * FROM (
    SELECT 'publication' AS type, ID, IDUSERS, TITLE, DESCRIPTION, IMG, DATE
    FROM v_publication
    UNION ALL
    SELECT 'publicite' AS type, ID, IDUSERS, TITRE, DESCRI, FICHIER, DATEPUBLICITE
    FROM v_publicite
    UNION ALL
    SELECT 'offre' AS type, ID, IDUSERS, NULL AS TITRE, TEXTE, NULL AS IMG, DATEPUBLICATION
    FROM v_3_derniers_offres
) AS combined_data
ORDER BY RANDOM();



INSERT INTO USERS(NOM, PRENOM, EMAIL, PASSWORD) VALUES
('RANDRIA', 'Kaloina', 'kaloinarandri@icloud.com', '12345'),
('RANDRIA', 'Kaliana', 'kalianarandri@icloud.com', '12345'),
('RANDRIA', 'Ny Kanto', 'nykantorandri@icloud.com', '12345'),
('RANDRIA', 'Ny Kiady', 'nykiadyrandri@icloud.com', '12345');



INSERT INTO publication(idusers, description, date) VALUES
(1, 'descripublication1', '03-06-2023 00:00:00'),
(2, 'descripublication2', '03-06-2023 00:00:00'),
(1, 'descripublication3', '03-06-2023 00:00:00');

INSERT INTO offre(idusers, texte, datepublication) VALUES
(1, 'descrioffre1', '01-06-2023 00:00:00'),
(3, 'descrioffre2', '02-06-2023 00:00:00'),
(3, 'descrioffre3', '03-06-2023 00:00:00'),
(2, 'descrioffre4', '01-05-2023 00:00:00');

INSERT INTO publicite(idusers, descri, datepublicite) VALUES
(1, 'descripublicite1', '03-06-2023 00:00:00'),
(3, 'descripublicite2', '03-06-2023 00:00:00'),
(2, 'descripublicite3', '03-06-2023 00:00:00');