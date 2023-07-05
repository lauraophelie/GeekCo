-------------- initialisation -----------------

CREATE ROLE geeksco LOGIN PASSWORD 'geeksco';
CREATE DATABASE geeksco;
ALTER DATABASE geeksco OWNER TO geeksco;

\c geeksco geeksco

-------------- Utilisateur ------------------

CREATE TABLE Profession(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(30)
);

CREATE TABLE Utilisateur(
    id VARCHAR(15) PRIMARY KEY,
    nom VARCHAR(40) NOT NULL,
    prenom VARCHAR(40),
    date_naissance DATE,
    id_profession VARCHAR(15) REFERENCES Profession(id),
    pseudo VARCHAR(12) NOT NULL,
    path_image VARCHAR(50),
    email VARCHAR(30) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(12) NOT NULL
);

CREATE TABLE Interet(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(30) NOT NULL
);

CREATE TABLE Interet_Utilisateur(
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_interet VARCHAR(15) REFERENCES Interet(id)
);

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

----------------- Offre ---------------------

CREATE TABLE Type_Offre(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(15) NOT NULL
);

CREATE TABLE Offre(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_categorie VARCHAR(15) REFERENCES Categorie(id),
    id_type VARCHAR(15) REFERENCES Type_Offre(id),
    path_image VARCHAR(50),
    date_publication TIMESTAMP,
    fin_validite TIMESTAMP,
    texte TEXT NOT NULL
);

CREATE TABLE Boost(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(15) UNIQUE NOT NULL,
    date_debut TIMESTAMP,
    duree INT DEFAULT 1,
    montant DOUBLE PRECISION NOT NULL
);

CREATE TABLE Boost_Offre(
    id VARCHAR(15) PRIMARY KEY,
    id_offre VARCHAR(15) REFERENCES Offre(id),
    id_boost VARCHAR(15) REFERENCES Boost(id),
    date_debut TIMESTAMP NOT NULL,
    date_fin TIMESTAMP NOT NULL
);

----------------- Publication -----------------

CREATE TABLE Publication(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_categorie VARCHAR(15) REFERENCES Categorie(id),
    path_image VARCHAR(50),
    date_publication TIMESTAMP,
    texte TEXT NOT NULL,
    nb_reaction INT DEFAULT 0 
);

CREATE TABLE Commentaire(
    id VARCHAR(15) PRIMARY KEY,
    id_publication VARCHAR(15) REFERENCES Publication(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    texte TEXT NOT NULL,
    nb_reaction INT DEFAULT 0 
);

CREATE TABLE util_pub (
    id SERIAL PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_publication VARCHAR(15) REFERENCES Publication(id)
);
----------------------- Abonnement ------------------------

CREATE TABLE Abonnement(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
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
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signaler_Publication(
    id VARCHAR(15) PRIMARY KEY,
    id_motif VARCHAR(15) REFERENCES Motif(id),
    id_publication VARCHAR(15) REFERENCES Publication(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signaler_Question(
    id VARCHAR(15) PRIMARY KEY,
    id_motif VARCHAR(15) REFERENCES Motif(id),
    id_question VARCHAR(15) REFERENCES Question(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signaler_Reponse(
    id VARCHAR(15) PRIMARY KEY,
    id_motif VARCHAR(15) REFERENCES Motif(id),
    id_reponse VARCHAR(15) REFERENCES Reponse(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),        -- ilay manao signalement
    date_signalement TIMESTAMP NOT NULL
);

CREATE TABLE Signalement_Utilisateur(
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),        -- ilay olona signalé
    id_type_signalement VARCHAR(15) REFERENCES Type_Signalement(id),
    id_motif VARCHAR(15) REFERENCES  Motif(id),
    nb INT NOT NULL DEFAULT 1
);

---------------- Chat & Code -----------------

CREATE TABLE Groupe(
    id VARCHAR(15) PRIMARY KEY,
    nom_groupe VARCHAR(20) NOT NULL,
    date_creation TIMESTAMP
);

CREATE TABLE Roles(
    id VARCHAR(15) PRIMARY KEY,
    designation VARCHAR(20) NOT NULL
);

CREATE TABLE Membre_Groupe(
    id_groupe VARCHAR(15) REFERENCES Groupe(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_roles VARCHAR(15) REFERENCES Roles(id)
);

CREATE TABLE Projet(
    id VARCHAR(15) PRIMARY KEY,
    id_groupe VARCHAR(15) REFERENCES Groupe(id) NULL,
    nom VARCHAR(20) NOT NULL,
    repertoire_base VARCHAR(40) NOT NULL, 
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id) NOT NULL
);

----------------- Nesorina aloha -----------------

CREATE TABLE Repertoire(
    id VARCHAR(15) PRIMARY KEY,
    id_projet VARCHAR(15) REFERENCES Projet(id),
    id_super VARCHAR(15) REFERENCES Repertoire(id) NULL,
    nom_repertoire VARCHAR(20) NOT NULL,
    chemin VARCHAR(50) NOT NULL
);

CREATE TABLE Code(
    id VARCHAR(15) PRIMARY KEY,
    id_repertoire VARCHAR(15) REFERENCES Repertoire(id),
    nom_fichier VARCHAR(15),
    chemin VARCHAR(50)
);

-------------- Gestion ID --------------------

CREATE OR REPLACE FUNCTION generate_id()
RETURNS TRIGGER AS $$
DECLARE
  prefixe TEXT;
BEGIN
  prefixe := UPPER(SUBSTRING(TG_ARGV[0] FROM 1 FOR 5));
  NEW.id := prefixe || LPAD(nextval(TG_ARGV[1] || '_id_seq')::TEXT, 3, '0');
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE SEQUENCE Utilisateur_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE profession_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE interet_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE categorie_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE question_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE reponse_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE type_offre_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE offre_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE boost_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE boost_offre_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE abonnement_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE type_signalement_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE motif_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE signaler_offre_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE signaler_publication_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE signaler_question_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE signaler_reponse_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE publication_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE commentaire_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE groupe_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE roles_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE projet_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE repertoire_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE code_id_seq START  WITH 1 INCREMENT BY 1;

CREATE TRIGGER Utilisateur_generate_id_trigger
BEFORE INSERT ON Utilisateur
FOR EACH ROW
EXECUTE FUNCTION generate_id('Utilisateur_','Utilisateur');

CREATE TRIGGER profession_generate_id_trigger
BEFORE INSERT ON Profession
FOR EACH ROW
EXECUTE FUNCTION generate_id('profession','profession');

CREATE TRIGGER interet_generate_id_trigger
BEFORE INSERT ON Interet
FOR EACH ROW
EXECUTE FUNCTION generate_id('interet','interet');

CREATE TRIGGER categorie_generate_id_trigger
BEFORE INSERT ON Categorie
FOR EACH ROW
EXECUTE FUNCTION generate_id('categorie','categorie');

CREATE TRIGGER question_generate_id_trigger
BEFORE INSERT ON Question
FOR EACH ROW
EXECUTE FUNCTION generate_id('question','question');

CREATE TRIGGER reponse_generate_id_trigger
BEFORE INSERT ON Reponse
FOR EACH ROW
EXECUTE FUNCTION generate_id('reponse','reponse');

CREATE TRIGGER type_offre_generate_id_trigger
BEFORE INSERT ON Type_Offre
FOR EACH ROW
EXECUTE FUNCTION generate_id('typ_offre','type_offre');

CREATE TRIGGER offre_generate_id_trigger
BEFORE INSERT ON Offre
FOR EACH ROW
EXECUTE FUNCTION generate_id('offre','offre');

CREATE TRIGGER boost_generate_id_trigger
BEFORE INSERT ON Boost
FOR EACH ROW
EXECUTE FUNCTION generate_id('boost','boost');

CREATE TRIGGER boost_offre_generate_id_trigger
BEFORE INSERT ON boost_offre
FOR EACH ROW
EXECUTE FUNCTION generate_id('b_offre','boost_offre');

CREATE TRIGGER abonnement_generate_id_trigger
BEFORE INSERT ON Abonnement
FOR EACH ROW
EXECUTE FUNCTION generate_id('abonnement','abonnement');

CREATE TRIGGER type_signalement_generate_id_trigger
BEFORE INSERT ON type_signalement
FOR EACH ROW
EXECUTE FUNCTION generate_id('typ_sign','type_signalement');

CREATE TRIGGER motif_generate_id_trigger
BEFORE INSERT ON motif
FOR EACH ROW
EXECUTE FUNCTION generate_id('motif','motif');

CREATE TRIGGER signaler_offre_generate_id_trigger
BEFORE INSERT ON signaler_offre
FOR EACH ROW
EXECUTE FUNCTION generate_id('s_offre','signaler_offre');

CREATE TRIGGER signaler_publication_generate_id_trigger
BEFORE INSERT ON signaler_publication
FOR EACH ROW
EXECUTE FUNCTION generate_id('s_publication','signaler_publication');

CREATE TRIGGER signaler_question_generate_id_trigger
BEFORE INSERT ON signaler_question
FOR EACH ROW
EXECUTE FUNCTION generate_id('s_question','signaler_question');

CREATE TRIGGER signaler_reponse_generate_id_trigger
BEFORE INSERT ON signaler_reponse
FOR EACH ROW
EXECUTE FUNCTION generate_id('s_reponse','signaler_reponse');

CREATE TRIGGER publication_generate_id_trigger
BEFORE INSERT ON publication
FOR EACH ROW
EXECUTE FUNCTION generate_id('publication','publication');

CREATE TRIGGER commentaire_generate_id_trigger
BEFORE INSERT ON commentaire
FOR EACH ROW
EXECUTE FUNCTION generate_id('commentaire','commentaire');

CREATE TRIGGER groupe_generate_id_trigger
BEFORE INSERT ON groupe
FOR EACH ROW
EXECUTE FUNCTION generate_id('groupe','groupe');

CREATE TRIGGER roles_generate_id_trigger
BEFORE INSERT ON roles
FOR EACH ROW
EXECUTE FUNCTION generate_id('roles','roles');

CREATE TRIGGER projet_generate_id_trigger
BEFORE INSERT ON projet
FOR EACH ROW
EXECUTE FUNCTION generate_id('projet','projet');

CREATE TRIGGER repertoire_generate_id_trigger
BEFORE INSERT ON repertoire
FOR EACH ROW
EXECUTE FUNCTION generate_id('repertoire','repertoire');

CREATE TRIGGER code_generate_id_trigger
BEFORE INSERT ON code
FOR EACH ROW
EXECUTE FUNCTION generate_id('code_','code');

------------------ modification forum ------------------------

ALTER TABLE Reponse ADD COLUMN date_publication TIMESTAMP;

------------------ modification offre ------------------------

CREATE TABLE IF NOT EXISTS Lieu (
    id VARCHAR(15) PRIMARY KEY,
    nom_lieu VARCHAR(30) NOT NULL,
    superficie NUMERIC,
    nb_population INT
);

CREATE TRIGGER lieu_generate_id_trigger
BEFORE INSERT ON lieu
FOR EACH ROW
EXECUTE FUNCTION generate_id('lieu_','lieu');

ALTER TABLE Offre ADD COLUMN id_lieu VARCHAR(15) REFERENCES Lieu(id);

------------------- modification utilisateur -------------------------

-- manao publication automatique rehefa manova pdp sy pdc
-- tsy compte n'ny iray isan'andro ny manova pdp sy pdc
-- etat: misy hoe encours: 0, temporaire: 1, ... izay hanaovana azy
CREATE TABLE PDP(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_publication VARCHAR(15) REFERENCES Publication(id),
    photo VARCHAR(40) NOT NULL,
    etat INT NOT NULL
);

CREATE SEQUENCE PDP_id_seq START  WITH 1 INCREMENT BY 1;

CREATE TRIGGER pdp_generate_id_trigger
BEFORE INSERT ON PDP
FOR EACH ROW
EXECUTE FUNCTION generate_id('PDP__','pdp');

----------------------- update forum --------------------------------

CREATE TABLE Reaction_Question(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_question VARCHAR(15) REFERENCES Question(id),
    date_reaction TIMESTAMP
);

CREATE TABLE Reaction_Reponse(
    id VARCHAR(15) PRIMARY KEY,
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    id_reponse VARCHAR(15) REFERENCES Reponse(id),
    date_reaction TIMESTAMP
);

CREATE SEQUENCE Reaction_Reponse_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE Reaction_Question_id_seq START  WITH 1 INCREMENT BY 1;

CREATE TRIGGER question_generate_id_trigger
BEFORE INSERT ON Reaction_Question
FOR EACH ROW
EXECUTE FUNCTION generate_id('R_Quest','question');

CREATE TRIGGER reponse_generate_id_trigger
BEFORE INSERT ON Reaction_Reponse
FOR EACH ROW
EXECUTE FUNCTION generate_id('R_Reponse','reponse');

------------------ modification table utilisateur ---------------------

ALTER TABLE Utilisateur ADD COLUMN date_insertion DATE DEFAULT NOW();

------------------ view pour actualite --------------------------------
CREATE OR REPLACE VIEW v_offres_dispos (
    id,
    idusers,
    designation,
    nom,
    prenom,
    pseudo,
    image_users,
    texte,
    path_image,
    date_publication,
    fin_validite
) AS (
    SELECT o.id, u.id, t_o.designation, u.nom, u.prenom, u.pseudo, u.path_image, o.texte, o.path_image, o.date_publication, o.fin_validite
    FROM offre o
    JOIN utilisateur u ON u.id = o.id_utilisateur
    JOIN type_offre t_o ON t_o.id = o.id_type
    where o.id_type != 'TYP_O002' AND o.fin_validite > now()
);

CREATE OR REPLACE VIEW v_publicite (
    id,
    idusers,
    designation,
    pseudo,
    image_users,
    texte,
    path_image,
    date_publication,
    fin_validite
) AS(
    SELECT o.id, u.id, t_o.designation, u.pseudo, u.path_image, o.texte, o.path_image, o.date_publication, o.fin_validite
    FROM offre o
    JOIN utilisateur u ON u.id = o.id_utilisateur
    JOIN type_offre t_o ON t_o.id = o.id_type
    where id_type = 'TYP_O002'    ------------- tokony id an ny publicite ao amin ny type_offre
);

CREATE OR REPLACE VIEW v_publication (
    id,
    idusers,
    pseudo,
    image_users,
    texte,
    path_image,
    date_publication,
    nb_reaction
) AS(
    SELECT p.id, u.id, u.pseudo, u.path_image, p.texte, p.path_image, p.date_publication, p.nb_reaction
    FROM publication p
    JOIN utilisateur u ON u.id = p.id_utilisateur
);

CREATE OR REPLACE VIEW v_commentaire (
    id,
    idusers,
    pseudo,
    image_users,
    texte,
    id_publication,
    nb_reaction
) AS(
    SELECT c.id, u.id, u.pseudo, u.path_image, c.texte, c.id_publication, c.nb_reaction
    FROM commentaire c
    JOIN utilisateur u ON u.id = c.id_utilisateur
);

------------------------- evenement ------------------------------------
create table event(
    idevent serial PRIMARY KEY,
    iduser VARCHAR(15),
    name_event VARCHAR(30),
    emplacement VARCHAR(30),
    date_event DATE,
    time_event TIME,
    short_description text,
    FOREIGN KEY (iduser) REFERENCES Utilisateur(id)
);

create table detailevent(
    iddetailevent serial PRIMARY KEY,
    idevent int,
    nombreplace int,
    photo text,
    prix float,
    description text,
    FOREIGN KEY (idevent) REFERENCES event(idevent)
);

create table historique(
    idhistorique serial PRIMARY KEY,
    idevent int,
    iduser VARCHAR(30),
    nombreplace int,
    photo text,
    prix float,
    description text,
    FOREIGN KEY (iduser) REFERENCES Utilisateur(id),
    FOREIGN KEY (idevent) REFERENCES event(idevent)
);

create table reservation (
    idreservation serial PRIMARY KEY,
    idevent int,
    iduser VARCHAR(15),
    nombreplace int,
    prix float,
    date DATE,
    FOREIGN KEY (idevent) REFERENCES event(idevent),
    FOREIGN KEY (iduser) REFERENCES Utilisateur(id)
);

CREATE OR REPLACE VIEW getallevent AS select e.idevent as idevent,u.iduser as iduser,e.name_event as name_event,e.emplacement as emplacement,e.date_event as date_event,e.time_event as time_event,e.short_description as short_description,d.photo as photo,d.prix as prix,d.nombreplace as nombreplace,d.description as description,u.prenom as prenom from event as e join detailevent as d on e.idevent=d.idevent join users as u on u.iduser = e.iduser;

CREATE OR REPLACE VIEW reservationlist AS select r.idevent as idevent , e.name_event as name_event , r.idreservation as numero , u.prenom as client , r.date as date , r.nombreplace as nombreplace , r.prix as prix from reservation as r 
JOIN event as e ON e.idevent = r.idevent
JOIN Utilisateur as u ON u.id = r.iduser;

--------------------- fin -----------------------------

CREATE OR REPLACE VIEW v_historique as SELECT historique.*, name_event, emplacement,date_event,time_event,short_description from historique join event on historique.idevent = event.idevent;

--------------------- Chat ----------------------------

CREATE TABLE Chat_Projet(
    id VARCHAR(15) PRIMARY KEY,
    id_projet VARCHAR(15) REFERENCES Projet(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    texte TEXT NOT NULL
);

CREATE TABLE Chat_Groupe(
    id VARCHAR(15) PRIMARY KEY,
    id_groupe VARCHAR(15) REFERENCES Groupe(id),
    id_utilisateur VARCHAR(15) REFERENCES Utilisateur(id),
    texte TEXT NOT NULL
);

CREATE SEQUENCE chat_projet_id_seq START  WITH 1 INCREMENT BY 1;
CREATE SEQUENCE chat_groupe_id_seq START  WITH 1 INCREMENT BY 1;

CREATE TRIGGER Chat_Groupe_generate_id_trigger
BEFORE INSERT ON Chat_Groupe
FOR EACH ROW
EXECUTE FUNCTION generate_id('c_groupe','Utilisateur');

CREATE TRIGGER Chat_Projet_generate_id_trigger
BEFORE INSERT ON Chat_Projet
FOR EACH ROW
EXECUTE FUNCTION generate_id('c_projet','profession');


--------------------- fin -----------------------------

