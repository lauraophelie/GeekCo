-------------- User ------------------

CREATE TABLE Profession(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(30)
);

CREATE TABLE User(
    id VARCHAR(15) PRIMARY KEY,
    nom VARCHAR(40) NOT NULL,
    prenom VARCHAR(40),
    date_naissance TIMESTAMP,
    id_profession VARCHAR(15) REFERENCES Profession(id),
    pseudo VARCHAR(12) NOT NULL,
    email VARCHAR(30) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(12) NOT NULL
);

CREATE TABLE Interet(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(30) NOT NULL
);

CREATE TABLE Interet_user(
    id_user VARCHAR(15) REFERENCES User(id),
    id_interet VARCHAR(15) REFERENCES Interet(id)
);

----------------- Forum -----------------

CREATE TABLE Categorie(
    id VARCHAR(15) PRIMARY KEY,
    id_interet VARCHAR(15) REFERENCES Interet(id),
    designation VARCHAR(30) NOT NULL
);

CREATE TABLE Question(
    id VARCHAR(15) PRIMARY KEY,
    id_categorie VARCHAR(15) REFERENCES Categorie(id),
    id_user VARCHAR(15) REFERENCES User(id),
    date_publication TIMESTAMP,
    texte VARCHAR(150) NOT NULL,
    screenshoot VARCHAR(50)
);

CREATE TABLE Reponse(
    id VARCHAR(15) PRIMARY KEY,
    id_question VARCHAR(15) REFERENCES Question(id),
    id_user VARCHAR(15) REFERENCES User(id),
    texte VARCHAR(150) NOT NULL,
    path_image VARCHAR(50),
    nb_reaction INT DEFAULT 0 
);

----------------- Offre ---------------------

CREATE TABLE Type_Offre(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(15) NOT NULL
);

CREATE TABLE Offre(
    id VARCHAR(15) PRIMARY KEY,
    id_user VARCHAR(15) REFERENCES User(id),
    id_categorie VARCHAR(15) REFERENCES Categorie(id),
    id_type VARCHAR(15) REFERENCES Type_Offre(id),
    path_image VARCHAR(50),
    date_publication TIMESTAMP,
    fin_validite TIMESTAMP,
    texte VARCHAR(150) NOT NULL
);

CREATE TABLE Boost(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(15) UNIQUE NOT NULL,
    date_debut TIMESTAMP,
    duree INT DEFAULT 1,
    montant DOUBLE PRECISION NOT NULL
);

CREATE TABLE BoostOffre(
    id VARCHAR(15) PRIMARY KEY,
    id_offre VARCHAR(15) REFERENCES Offre(id),
    id_boost VARCHAR(15) REFERENCES Boost(id),
    date_debut TIMESTAMP NOT NULL,
    date_fin TIMESTAMP NOT NULL
);

----------------------- Abonnement ------------------------

CREATE TABLE Abonnement(
    id VARCHAR(15) PRIMARY KEY,
    id_user VARCHAR(15) REFERENCES User(id),
    date_payement TIMESTAMP NOT NULL,
    reference VARCHAR(40) NOT NULL,
    mois INT NOT NULL,
    annee INT NOT NULL,
    montant DOUBLE PRECISION NOT NULL
);

------------------------ Signalement ----------------------------

CREATE TABLE Type_Signalement(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(40) NOT NULL
);

CREATE TABLE Motif(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(40) NOT NULL,
    niveau INT DEFAULT 0
);

CREATE TABLE Signaler_Offre(
    id VARCHAR(15) PRIMARY KEY,
    id_motif VARCHAR(15) REFERENCES Motif(id),
    id_offre VARCHAR(15) REFERENCES Offre(id),
    id_user VARCHAR(15) REFERENCES User(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signaler_Publication(
    id VARCHAR(15) PRIMARY KEY,
    id_motif VARCHAR(15) REFERENCES Motif(id),
    id_publication VARCHAR(15) REFERENCES Publication(id),
    id_user VARCHAR(15) REFERENCES User(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signaler_Question(
    id VARCHAR(15) PRIMARY KEY,
    id_motif VARCHAR(15) REFERENCES Motif(id),
    id_question VARCHAR(15) REFERENCES Question(id),
    id_user VARCHAR(15) REFERENCES User(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signaler_Reponse(
    id VARCHAR(15) PRIMARY KEY,
    id_motif VARCHAR(15) REFERENCES Motif(id),
    id_reponse VARCHAR(15) REFERENCES Reponse(id),
    id_user VARCHAR(15) REFERENCES User(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signalement_User(
    id_user VARCHAR(15) REFERENCES User(id),        -- ilay olona signalé
    id_type_signalement VARCHAR(15) REFERENCES Type_Signalement(id),
    id_motif VARCHAR(15) REFERENCES  Motif(id),
    nb INT NOT NULL DEFAULT 1
);

---------------- Chat & Code -----------------
