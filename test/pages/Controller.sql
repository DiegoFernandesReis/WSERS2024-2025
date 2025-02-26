drop database if exists WSERS2PROJECT;
create database WSERS2PROJECT;
use WSERS2PROJECT;

Create table Controller (
    ProductId int,
    ProductName varchar(255),
    Price int,
    Description varchar(255),
    Count varchar(255),
    Image int,
    ProductNameFR varchar(255),
    buy int,
    countFR int,
    buyFR int,
);



Insert into Controller (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values("1","Controller","59,99 €","The Controller is brand new, the battery lasts a long time before it runs out","Inventory:10","controller.jpeg","Controller","Le controleur est neuf, la batterie dure longtemps avant de s'épuiser","buy","Inventaire:10","acheter");
Insert into Controller (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values ("2","Joy-con","69,99 €","The Joy con is very nice if you want to play with your friends","Inventory:20","joycon.png","Joy-con;Le Joy-con est très sympa si vous voulez jouer avec vos amis","buy","Inventaire:20","acheter");