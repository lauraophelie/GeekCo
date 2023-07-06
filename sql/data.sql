INSERT INTO Profession (designation)
VALUES 
    ('Ingénieur'),
    ('Médecin'),
    ('Avocat');

INSERT INTO Type_Offre (designation)
VALUES 
    ('Offre'),
    ('Publicite');

INSERT INTO Utilisateur (nom, prenom, date_naissance, id_profession, pseudo, path_image, email, mot_de_passe)
VALUES 
    ('Dupont', 'Jean', '1985-05-12 00:00:00', 'PROFE001', 'jdupont', 'person_1.jpg', 'jdupont@example.com', 'pass1234'),
    ('Martin', 'Marie', '1990-08-24 00:00:00', 'PROFE002', 'mmartin', 'person_3.jpg', 'mmartin@example.com', 'secret456'),
    ('Dubois', 'Pierre', '1988-11-30 00:00:00','PROFE003', 'pdubois', 'person_4.jpg', 'pdubois@example.com', 'abcdef789');

INSERT INTO Offre (id_utilisateur, id_type, path_image, date_publication, fin_validite, texte)
VALUES 
    ('UTILI001', 'TYP_O001', 'portrait.webp', '2023-06-30 10:00:00', '2023-07-31 23:59:59', 'Nous recherchons un ingénieur'),
    ('UTILI002', 'TYP_O001', 'portrait.webp', '2023-07-01 09:30:00', '2023-08-15 23:59:59', 'Offre de stage en marketing'),
    ('UTILI003', 'TYP_O002', 'portrait.webp', '2023-07-02 14:15:00', '2023-07-10 23:59:59', 'Poste à temps partiel disponible'),
    ('UTILI002', 'TYP_O002', 'portrait.webp', '2023-07-03 11:45:00', '2023-09-30 23:59:59', 'Recherche de freelancers'),
    ('UTILI001', 'TYP_O001', 'portrait.webp', '2023-07-04 16:20:00', '2023-08-31 23:59:59', 'Contrat à durée déterminée');

INSERT INTO Publication (id_utilisateur, path_image, date_publication, texte, nb_reaction)
VALUES 
    ('UTILI004', 'portrait.webp', '2023-06-30 10:00:00', 'Nouvelle publication', 0),
    ('UTILI002', 'portrait.webp', '2023-07-01 09:30:00', 'Publication intéressante', 0),
    ('UTILI002', 'portrait.webp', '2023-07-02 14:15:00', 'Partage d information', 0),
    ('UTILI004', 'portrait.webp', '2023-07-03 11:45:00', 'Publication importante', 0),
    ('UTILI003', 'portrait.webp', '2023-07-04 16:20:00', 'Nouvelles mises à jour', 0);

INSERT INTO Commentaire (id_publication, id_utilisateur, texte, nb_reaction)
VALUES 
    ('PUBLI001', 'UTILI002', 'Très intéressant!', 0),
    ('PUBLI001', 'UTILI003', 'Merci pour le partage', 0),
    ('PUBLI002', 'UTILI004', 'Je suis d accord avec toi', 0),
    ('PUBLI003', 'UTILI002', 'Super nouvelle!', 0),
    ('PUBLI005', 'UTILI003', 'J ai hâte de voir ça!', 0);

alter table utilisateur alter column date_insertion set default now();