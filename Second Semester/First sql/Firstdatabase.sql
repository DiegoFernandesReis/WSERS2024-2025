drop database if exists myDbTestNo2;
create database myDbTestNo2;
use myDbTestNo2;

create table Countries (
    CountryId int primary key auto_increment,
    CountryName varchar(255)
);


CREATE TABLE Users (
    UserId int  primary key auto_increment,
    UserName varchar(255),
    Email varchar(255),
    CountryId int,
    FOREIGN KEY (CountryId) REFERENCES Countries(CountryId)
);

Insert into Countries (CountryName) Values("Luxembourg");
Insert into Countries (CountryName) Values("Portugal");
Insert into Countries (CountryName) Values("Germany");
Insert into Countries (CountryName) Values("Yemen");

Insert into Users (UserName,Email,CountryId) Values("Dan","dude@lpem", 4);
Insert into Users (UserName,Email,CountryId) Values("Ayman","ayman@lpem", 3);
Insert into Users (UserName,Email,CountryId) Values("Diego","diego@lpem", 2);
