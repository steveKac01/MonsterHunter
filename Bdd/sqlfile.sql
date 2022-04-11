create database MonsterHunter;
use MonsterHunter;
drop table Monster;

create table Monster(
id int primary key auto_increment unique,
name varchar(100) not null unique,
nickname varchar(100)not null,
description text not null,
specie varchar(100) not null,
element  varchar(100),
weakagainst  varchar(100),
lengthmin float,
lengthmax float,
generation varchar(10) not null,
agro bool
)ENGINE = InnoDB charset = UTF8MB4;


create table User(
id int primary key auto_increment unique,
username varchar(100) not null,
password varchar(150) not null,
email varchar(150) not null unique
)ENGINE = InnoDB charset = UTF8MB4;

## -------------------[DATA]

insert into User values("","steve","123","steve@aol.fr");
insert into User values("","gabz","123","gabz@aol.fr");

select * from user;

insert into monster values("","Nergigante","Dragon destructeur","Le Nergigante est un Dragon ancien qui arbore une très grosse armure d'écailles brunes et beiges et de pics saillants, avec des teintes de rose sur le dessous de son corps. Son apparence générale évoque la brutalité.
Armé de griffes acérées, d'un museau court bardé de crocs grossiers et d'une imense paire de cornes, il compte sur sa sauvagerie et son extraordinaire force pour combattre. Son corps est recouvert de pics -même sur ses ailes- qu'il peut projetter et faire repousser. Ces pointes blanches noircissent avec le temps et deviennent plus dures, protégeant alors le Nergigante plus efficacement et infligeant des blessures plus profondes lorsqu'éjectées."
,"Dragon ancien","","foudre",1626.35,1848.12,"5eme",true);

insert into monster values("","Rathalos","Roi des cieux","De taille moyenne, il est reconnaissable par sa morphologie (2 pattes et 2 ailes), sa couleur rouge cramoisie, ses ailes et queue bardées de piques et son patagium comportant des motifs de flammes.
Il est recouvert de plaques et d'écailles rouges et noires avec le dessous du corps et la membrane des ailes beiges. De chaque côté de la mâchoire, sous les oreilles, se trouvent des excroissances de plaques faisant penser à des mandibules d'insecte. Les pattes ont des serres acérées, permettant de tuer et de saisir des proies, et la queue se termine en des pointes toxiques, dont une grande tout au bout, à la manière d'un scorpion.
Au delà de son apparence de Wyverne, le Rathalos évoque aussi l'aigle, autant par son museau crochu que par son statut de roi des cieux."
,"Wyverne","feu","dragon",1140.6,2248.6,"1ere",true);

insert into monster values("","Dodogama","Le voleur de roc","Le Dodogama est une Wyverne à crocs à l'apparence et à la démarche pataude. Son corps est couvert d'écailles bleues avec des rayures et une queue oranges qui dans l'ensemble rappellent l'Agame des arbres à tête bleu. Son ventre corpulent est gris sale et il a de petits yeux ronds jaunes. Il possède une mâchoire massive dont il se sert pour stocker des rochers dans sa bouche et qui brille d'orange lorsque ces rochers sont instables."
,"Wyverne à croc","Explosion","foudre",977.78,2000,"5eme",false);

insert into monster values("gabzonator","marche po","Le voleur de roc","Le Dodogama est une Wyverne à crocs à l'apparence et à la démarche pataude. Son corps est couvert d'écailles bleues avec des rayures et une queue oranges qui dans l'ensemble rappellent l'Agame des arbres à tête bleu. Son ventre corpulent est gris sale et il a de petits yeux ronds jaunes. Il possède une mâchoire massive dont il se sert pour stocker des rochers dans sa bouche et qui brille d'orange lorsque ces rochers sont instables."
,"Wyverne à croc","Explosion","foudre",977.78,2000,"5eme",false);


select * from monster;



update monster set lengthmin=1626.35, lengthmax=2310.14 where id=1;