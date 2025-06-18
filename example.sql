drop database if exists ppl_countries;
create database ppl_countries;
use ppl_countries;
 
create table Countries (
    countryid int not null auto_increment primary key,
    countryname varchar(255) unique not null
);
 
create table ppl (
    personid int not null auto_increment primary key,
    countryid int not null,
    firstname varchar(255),
    lastname varchar(255),
    age int not null,
    foreign key (countryid) references Countries(countryid) on delete cascade
);
 
insert into Countries(countryname) values("Luxembourg");
insert into Countries(countryname) values("Germany");
insert into Countries(countryname) values("France");
insert into Countries(countryname) values("Ukraine");
insert into Countries(countryname) values("Afghanistan");
insert into ppl(firstname, lastname, age, countryid) values ("Diego", "fernandes", 20, 1);
insert into ppl(firstname, lastname, age, countryid) values ("Eliano", "rilli", 17, 3);
insert into ppl(firstname, lastname, age, countryid) values ("Laura", "glode", 19, 3);