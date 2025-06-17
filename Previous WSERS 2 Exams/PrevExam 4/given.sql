drop database if exists WSERS2_EXAM;
create database WSERS2_EXAM;

use WSERS2_EXAM;

create table Countries(
    CountryId int not null auto_increment primary key,
    CountryName varchar(50) not null
);

create table Cities(
    CityId int not null auto_increment primary key,
    CountryId int not null,
    CityName varchar(100) not null,
    Foreign Key (CountryId) references Countries(CountryId)
);

insert into Countries(CountryName) values('Luxembourg'),("United Kingdom"),("Romania");
insert into Cities(CountryId, CityName) values(1, "Luxembourg"),(1, "Esch"),(1, "Dudelange"),(2, "London"),(2, "Manchester"),(3, "Bucharest"),(3, "Cluj-Napoca");

