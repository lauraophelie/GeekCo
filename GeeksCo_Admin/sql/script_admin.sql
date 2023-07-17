---------------------------- 01-07-2023 -----------------------------------

------------------------- vue utilisateur -------------------------------------

SELECT * FROM Utilisateur u
JOIN profession AS p ON u.id = p.id;

SELECT
    u.id,
    u.nom,
    u.prenom,
    u.pseudo as pseudonyme,
    (EXTRACT(YEAR FROM now()) - EXTRACT(YEAR FROM u.date_naissance)) as age,
    u.email,
    u.mot_de_passe,
    p.designation as profession,
    u.date_insertion as date_inscription
FROM utilisateur u
JOIN profession AS p ON u.id_profession = p.id;

--

CREATE OR REPLACE VIEW v_utilisateurs AS(
    SELECT
        u.id,
        u.nom,
        u.prenom,
        u.pseudo as pseudonyme,
        (EXTRACT(YEAR FROM now()) - EXTRACT(YEAR FROM u.date_naissance)) as age,
        u.email,
        u.mot_de_passe,
        p.designation as profession,
        u.date_insertion as date_insertion
    FROM utilisateur u
    JOIN profession AS p ON u.id_profession = p.id
);

----------------------------- vue catégorie ------------------------------

SELECT
    c.id,
    c.designation as categorie,
    i.designation as interet
FROM categorie c 
JOIN interet AS i ON c.id_interet = i.id;

--

CREATE OR REPLACE VIEW v_categorie AS(
    SELECT
        c.id,
        c.designation as categorie,
        i.designation as interet
    FROM categorie c 
    JOIN interet AS i ON c.id_interet = i.id
);

----------------------------- vue offre ----------------------------------

SELECT * FROM offre o
JOIN utilisateur AS u ON o.id_utilisateur = u.id
JOIN v_categorie AS c ON o.id_categorie = c.id
JOIN type_offre AS t ON o.id_type = t.id;

SELECT
    o.id,
    u.pseudonyme AS utilisateur,
    c.categorie,
    t.designation AS type_offre,
    o.path_image,
    l.nom_lieu AS lieu,
    o.date_publication,
    o.fin_validite,
    o.texte AS description_offre
FROM offre o
JOIN v_utilisateurs AS u ON o.id_utilisateur = u.id
JOIN v_categorie AS c ON o.id_categorie = c.id
JOIN type_offre AS t ON o.id_type = t.id
JOIN lieu AS l ON o.id_lieu = l.id;

--

CREATE OR REPLACE VIEW v_offres AS(
    SELECT
        o.id,
        u.pseudonyme AS utilisateur,
        c.categorie,
        t.designation AS type_offre,
        o.path_image,
        l.nom_lieu AS lieu,
        o.date_publication,
        o.fin_validite,
        o.texte AS description_offre
    FROM offre o
    JOIN v_utilisateurs AS u ON o.id_utilisateur = u.id
    JOIN v_categorie AS c ON o.id_categorie = c.id
    JOIN type_offre AS t ON o.id_type = t.id
    JOIN lieu AS l ON o.id_lieu = l.id
);


-------------------------------- vue boost offre -------------------------------------------

SELECT
    b.id,
    o.id as offre,
    boost.designation as boost,
    boost.montant as montant_boost,
    boost.duree as duree_boost,
    boost.date_debut as debut_boost,
    b.date_debut,
    b.date_fin
FROM boost_offre b
JOIN v_offres AS o ON b.id_offre = o.id
JOIN boost ON b.id_boost = boost.id;

--

CREATE OR REPLACE VIEW v_boost AS(
    SELECT
        b.id,
        o.id as offre,
        boost.designation as boost,
        boost.montant as montant_boost,
        boost.duree as duree_boost,
        boost.date_debut as debut_boost,
        b.date_debut,
        b.date_fin
    FROM boost_offre b
    JOIN v_offres AS o ON b.id_offre = o.id
    JOIN boost ON b.id_boost = boost.id
);

-------------------------------- vue publication --------------------------------

SELECT 
    p.id,
    u.id as id_utilisateur,
    u.pseudonyme as utilisateur,
    c.categorie,
    p.path_image,
    p.date_publication,
    p.texte as publication,
    p.nb_reaction as reactions
FROM publication p
JOIN v_utilisateurs AS u ON p.id_utilisateur = u.id
JOIN v_categorie AS c ON p.id_categorie = c.id;

--

CREATE OR REPLACE VIEW v_publication AS(
    SELECT 
        p.id,
        u.id as id_utilisateur,
        u.pseudonyme as utilisateur,
        c.categorie,
        p.path_image,
        p.date_publication,
        p.texte as publication,
        p.nb_reaction as reactions
    FROM publication p
    JOIN v_utilisateurs AS u ON p.id_utilisateur = u.id
    JOIN v_categorie AS c ON p.id_categorie = c.id
);

-------------------------------------- vue commentaire -------------------------------------

SELECT
    c.id,
    p.id as publication,
    u.id as id_utilisateur_comment,
    u.pseudonyme as utilisateur_comment,
    c.texte as commentaire,
    c.path_image,
    c.nb_reaction as reactions
FROM commentaire c
JOIN v_publication AS p ON c.id_publication = p.id
JOIN v_utilisateurs AS u ON c.id_utilisateur = u.id;

--

CREATE OR REPLACE VIEW v_commentaire AS(
    SELECT
        c.id,
        p.id as publication,
        u.id as id_utilisateur_comment,
        u.pseudonyme as utilisateur_comment,
        c.texte as commentaire,
        c.path_image,
        c.nb_reaction as reactions
    FROM commentaire c
    JOIN v_publication AS p ON c.id_publication = p.id
    JOIN v_utilisateurs AS u ON c.id_utilisateur = u.id
);


------------------------------------ 03-07-2023 -----------------------------------------------

INSERT INTO profession(designation) VALUES('DSI'), 
                                        ('Developpeur Back End'), 
                                        ('Developpeur Front End'),
                                        ('Chef de projet'),
                                        ('Game Designer'),
                                        ('Developpeur Full Stack'),
                                        ('Data Analyst');

INSERT INTO utilisateur(nom, prenom, date_naissance, id_profession, pseudo, email, mot_de_passe) 
                VALUES('RASOLONDRAIBE', 'Sarah', '1998-12-04', 'PROFE001', 'sarraaahhh', 'sarahrasolo@outlook.fr', '01234');

------------------------------------- 04-07-2023 -----------------------------------------------

CREATE SEQUENCE administrateur_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS administrateur(
    id VARCHAR(15) PRIMARY KEY,
    nom VARCHAR(50),
    mot_de_passe VARCHAR(50)
);

CREATE TRIGGER administrateur_generate_id_trigger
BEFORE INSERT ON administrateur
FOR EACH ROW
EXECUTE FUNCTION generate_id('administrateur', 'administrateur');


ALTER TABLE administrateur ADD CONSTRAINT check_admin UNIQUE(nom, mot_de_passe);


INSERT INTO administrateur(nom, mot_de_passe) VALUES
                            ('Aline', '012345'),
                            ('Anne', '0000');


INSERT INTO utilisateur(nom, prenom, date_naissance, id_profession, pseudo, email, mot_de_passe) 
                VALUES('RASOA', 'Liana', '2000-01-12', 'PROFE007', 'liana', 'lianaras@outlook.fr', '01234');


------------------------------------------------ 05-07-2023 --------------------------------------------

INSERT INTO abonnement(id_utilisateur, date_payement, reference, mois, annee, montant) VALUES
                        ('UTILI001', now(), 'REF0001', 7, 2023, 450000);

INSERT INTO abonnement(id_utilisateur, date_payement, reference, mois, annee, montant) VALUES
                        ('UTILI002', now(), 'REF0002', 7, 2023, 450000);

INSERT INTO abonnement(id_utilisateur, date_payement, reference, mois, annee, montant) VALUES
                        ('UTILI003', now(), 'REF0002', 7, 2023, 450000);

INSERT INTO abonnement(id_utilisateur, date_payement, reference, mois, annee, montant) VALUES
                        ('UTILI004', now(), 'REF0004', 7, 2023, 450000);

SELECT * FROM abonnement a
JOIN v_utilisateurs u ON a.id_utilisateur = u.id;

SELECT
    a.id as abonnement,
    u.nom,
    u.prenom,
    u.pseudonyme as utilisateur,
    a.date_payement,
    a.reference,
    a.mois,
    a.annee,
    a.montant,
    (a.date_payement + INTERVAL '30 days') as date_limite
FROM abonnement a
JOIN v_utilisateurs u ON a.id_utilisateur = u.id;

CREATE OR REPLACE VIEW v_abonnements AS(
    SELECT
        a.id as abonnement,
        u.nom,
        u.prenom,
        u.pseudonyme as utilisateur,
        a.date_payement,
        a.reference,
        a.mois,
        a.annee,
        a.montant,
        (a.date_payement + INTERVAL '30 days') as date_limite
    FROM abonnement a
    JOIN v_utilisateurs u ON a.id_utilisateur = u.id
);

SELECT * FROM v_abonnements WHERE date_limite < now();