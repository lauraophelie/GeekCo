CREATE TABLE Categorie(
    id VARCHAR(15) PRIMARY KEY,
    id_interet VARCHAR(15) REFERENCES Interet(id),
    designation VARCHAR(30) NOT NULL
);

----------------- Forum -----------------

CREATE TABLE Question(
    id VARCHAR(15) PRIMARY KEY,
    id_categorie VARCHAR(15) REFERENCES Categorie(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    date_publication TIMESTAMP,
    texte TEXT NOT NULL,
    screenshoot VARCHAR(50)
);

CREATE TABLE Reponse(
    id VARCHAR(15) PRIMARY KEY,
    id_question VARCHAR(15) REFERENCES Question(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    texte TEXT NOT NULL,
    path_image VARCHAR(50),
    nb_reaction INT DEFAULT 0 
);

CREATE TABLE Reaction_Question(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_question VARCHAR(15) REFERENCES Question(id),
    date_reaction TIMESTAMP
);

CREATE TABLE Reaction_Reponse(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_question VARCHAR(15) REFERENCES Question(id),
    date_reaction TIMESTAMP
);

--------------- VIEW -------------------

CREATE VIEW v_reponse AS
SELECT Utilisateur.nom as nom_utilisateur, Utilisateur.prenom as prenom_utilisateur, Utilisateur.photo as photo, Reponse.*
FROM Reponse
join Utilisateur on Utilisateur.id = Reponse.id_utilisateur;

CREATE VIEW v_question AS
SELECT Utilisateur.nom as nom_utilisateur, Utilisateur.prenom as prenom_utilisateur, Utilisateur.photo as photo, Question.*
FROM Question
join Utilisateur on Utilisateur.id = Question.id_utilisateur;

