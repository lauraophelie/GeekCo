create table users(
    id serial primary key,
    nom varchar(50),
    prenom varchar(50),
    dtn DATE,
    profil varchar(100)
);

create table publicite(
    id serial primary key,
    titre varchar(100),
    descri varchar(500),
    fichier varchar(50),
    datepublicite datetime,
    id_users int,
    foreign key(id_users) references users(id)
);

create table commentaire(
    id serial primary key,
    id_users int,
    id_pub int,
    commentaire varchar(500),
    datecomm datetime,
    foreign key(id_users) references users(id),
    foreign key(id_pub) references publicite(id)
);