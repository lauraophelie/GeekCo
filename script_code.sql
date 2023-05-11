CREATE TABLE projet(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(15),
    proprietaire INT REFERENCES utilisateur(id),
    type_projet VARCHAR(15),
    id_groupe INT REFERENCES groupe(id) NULL
);

CREATE TABLE groupe(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(15),
    proprietaire INT REFERENCES utilisateur(id)
);

CREATE TABLE groupe_utilisateur(
    id_groupe INT REFERENCES groupe(id),
    id_membre REFERENCES utilisateur(id)
);

CREATE TABLE code(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(15) NOT NULL,
    fichier VARCHAR(40) NOT NULL,
    id_projet REFERENCES projet(id)
);

CREATE TABLE chat_groupe(
    id SERIAL PRIMARY KEY,
    time_chat DATETIME,
    id_membre REFERENCES utilisateur(id),
    id_projet REFERENCES projet(id)
);

CREATE TABLE chat_code(
    id SERIAL PRIMARY KEY,
    time_chat DATETIME,
    id_membre REFERENCES utilisateur(id),
    id_code REFERENCES code(id)
);