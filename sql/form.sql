create table Personne(
    id_personne SERIAL,
    nom_personne VARCHAR(20),
    PRIMARY KEY (idpersonne)
);
CREATE TABLE Categorie(
    id_categorie SERIAL,
    nom_categorie VARCHAR(20),
    PRIMARY KEY (id_categorie)
);
CREATE TABLE Question(
    id_question SERIAL,
    id_categorie int NOT NULL,
    id_personne int NOT NULL,
    date_publication DATE NOT NULL, 
    libelle TEXT,
    screenshoot text,
    PRIMARY KEY (id_question),
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id_categorie),
    FOREIGN KEY (id_personne) REFERENCES Personne(id_personne)
);
CREATE TABLE Reponse(
    id_reponse SERIAL,
    id_question int,
    nb_reaction int DEFAULT 0 NOT NULL,
    PRIMARY KEY (id_reponse),
    FOREIGN KEY (id_question) REFERENCES Question(id_question)
);

INSERT INTO Personne (nom_personne) VALUES
('John'),
('Emma'),
('Michael'),
('Sophia');

INSERT INTO Categorie (nom_categorie) VALUES
('Sports'),
('Mode'),
('Technologie'),
('Voyage');

INSERT INTO Question (id_categorie, id_personne, date_publication, libelle, screenshoot) VALUES
(1, 1, '2023-05-01', 'Premier message dans la catégorie Sports', 'screenshot1.png'),
(2, 2, '2023-05-02', 'Nouvelle tendance de mode', 'screenshot2.png'),
(3, 3, '2023-05-03', 'Les dernières innovations technologiques', 'screenshot3.png'),
(4, 4, '2023-05-04', 'Les meilleurs endroits à visiter', 'screenshot4.png');

INSERT INTO forum (id_insertforum, nb_reaction) VALUES
(1, 5),
(2, 3),
(3, 10),
(4, 2);

CREATE OR REPLACE VIEW classement AS select p.nom_personne , f.nb_reaction from reponse as f 
JOIN Question as inser on inser.id_question = f.id_question
JOIN Personne as p on p.id_personne = inser.id_personne 
ORDER BY nb_reaction DESC;