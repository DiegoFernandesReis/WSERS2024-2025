drop database if exists persons;
create database persons;
use persons;

create table BirthCities (
    BirthCities_id int not null AUTO_INCREMENT,
    BirthCities_name varchar(50) not null,
    primary key (BirthCities_id)
);

create table Persons(
    BirthCities_id int not null,
    PersonName varchar(50) not null,
    primary KEY (PersonName),
    FOREIGN KEY (BirthCities_id) references BirthCities(BirthCities_id)
);

Insert into BirthCities(BirthCities_name) Values("London"),("Bucharest"),("Luxembourg"),("Paris");