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
    name_event VARCHAR(30),
    emplacement VARCHAR(30),
    date_event DATE,
    time_event TIME,
    short_description text,
    nombreplace int,
    photo text,
    prix float,
    description text,
    FOREIGN KEY (iduser) REFERENCES Utilisateur(id)
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

CREATE OR REPLACE VIEW getallevent AS select e.idevent as idevent,u.id as iduser,e.name_event as name_event,e.emplacement as emplacement,e.date_event as date_event,e.time_event as time_event,e.short_description as short_description,d.photo as photo,d.prix as prix,d.nombreplace as nombreplace,d.description as description,u.prenom as prenom from event as e join detailevent as d on e.idevent=d.idevent join Utilisateur as u on u.id = e.iduser;

CREATE OR REPLACE VIEW reservationlist AS select r.idevent as idevent , e.name_event as name_event , r.idreservation as numero , u.prenom as client , r.date as date , r.nombreplace as nombreplace , r.prix as prix from reservation as r 
JOIN event as e ON e.idevent = r.idevent
JOIN Utilisateur as u ON u.id = r.iduser;

