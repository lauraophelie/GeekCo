---------------------------- 01-07-2023 -----------------------------------

------------------------- vue utilisateur -------------------------------------

SELECT * FROM Utilisateur u
JOIN profession AS p ON u.id = p.id;

SELECT
    u.id,
    u.nom,
    u.prenom,
    u.pseudo as pseudonyme,
    (now() - u.date_naissance) as age,
    u.email,
    u.mot_de_passe,
    p.designation as profession,
    u.date_insertion as date_inscription
FROM utilisateur u
JOIN profession AS p ON u.id = p.id;

--

CREATE OR REPLACE VIEW v_utilisateurs AS(
    SELECT
        u.id,
        u.nom,
        u.prenom,
        u.pseudo as pseudonyme,
        (now() - u.date_naissance) as age,
        u.email,
        u.mot_de_passe,
        p.designation as profession,
        u.date_insertion as date_inscription
    FROM utilisateur u
    JOIN profession AS p ON u.id = p.id
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

