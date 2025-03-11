drop database if exists WSERS2PROJECT;
create database WSERS2PROJECT;
use WSERS2PROJECT;

Create table Nintendo (
    ProductId int,
    ProductNameEN varchar(255),
    Price int,
    Description varchar(255),
    Count varchar(255),
    Image varchar(255),
    ProductNameFR varchar(255),
    DescriptionFR varchar(255),
    buy int,
    countFR int,
    buyFR int,
);

Create table Controller (
    ProductId int,
    ProductNameEN varchar(255),
    Price int,
    Description varchar(255),
    Count varchar(255),
    Image varchar(255),
    ProductNameFR varchar(255),
    DescriptionFR varchar(255),
    buy int,
    countFR int,
    buyFR int,
);

Create table Accessories (
    ProductId int,
    ProductNameEN varchar(255),
    Price int,
    Description varchar(255),
    Count varchar(255),
    Image varchar(255),
    ProductNameFR varchar(255),
    DescriptionFR varchar(255),
    buy int,
    countFR int,
    buyFR int,
);

Create table translations (
   ID varchar (255),
   ENText varchar (255),
   FRText varchar (255)
);

Create table Orders (
username varchar(255),
date varchar (255),
ProductId varchar (255),
);



create table shopusers (
    userId int not null auto_increment primary key,
    username varchar(255) unique not null,
    psw varchar (255) not null,
    isAdmin int,
    phonenumber int(255),
    email varchar(255)
)




Insert into translations(ID, ENText, FRText) Values ("Home", "Home", "Acceuil");
Insert into translations(ID, ENText, FRText) Values ("Products", "Products", "Produits");
Insert into translations(ID, ENText, FRText) Values ("Accessories", "Accessories", "Accesoires");
Insert into translations(ID, ENText, FRText) Values ("Register", "Register", "Enregistrer");
Insert into translations(ID, ENText, FRText) Values ("login", "login", "connection");
Insert into translations(ID, ENText, FRText) Values ("log-out", "log-out", "Deconnexion");
Insert into translations(ID, ENText, FRText) Values ("NoUser", "user unknown", "utilisateur inconnu");
Insert into translations(ID, ENText, FRText) Values ("WelcomeMessage", "Nintendo switch online shop", "Nintendo switch boutique en ligne");
Insert into translations(ID, ENText, FRText) Values ("Controller", "Controller", "Manette");
Insert into translations(ID, ENText, FRText) Values ("Nintendoswitch", "Nintendoswitch", "Nintendoswitch");
Insert into translations(ID, ENText, FRText) Values ("Admin", "Admin", "Administrateur");
Insert into translations(ID, ENText, FRText) Values ("Welcome", "Welcome", "Bienvenue");
Insert into translations(ID, ENText, FRText) Values ("RegisterMessage", "To Register fill the following form", "Pour Enregistrer remplissez le format");
Insert into translations(ID, ENText, FRText) Values ("Enterusername", "Enter your username", "Entrer le nom d'utilisateur");
Insert into translations(ID, ENText, FRText) Values ("Choosepassword", "Please choose a password", "Choissisez un mot de passe");
Insert into translations(ID, ENText, FRText) Values ("Retypepassword", "Please retype the password", "Retapez le password");
Insert into translations(ID, ENText, FRText) Values ("Createaccount", "Create account", "Créé le compte");
Insert into translations(ID, ENText, FRText) Values ("Inventory", "Inventory", "inventaire");
Insert into translations(ID, ENText, FRText) Values ("Passwordnotmatch", "Password do not match. Please try again", "Password incorrect. Ressayez à nouveau");
Insert into translations(ID, ENText, FRText) Values ("Typeusername", "Type your username", "Saisissez vos Nom d'utilisateur");
Insert into translations(ID, ENText, FRText) Values ("Enterpassword", "Enter a password", "Saisissez votre mot de passe");
Insert into translations(ID, ENText, FRText) Values ("followingproducts", "The following products on sale", "les produits suivants en vente");
Insert into translations(ID, ENText, FRText) Values ("notdatabase", "Your username is not in our database", "votre nom d'utilisateur n'est pas dans notre base de données");
Insert into translations(ID, ENText, FRText) Values ("invalidpassword", "Invalid password", "mot de passe invalide");
Insert into translations(ID, ENText, FRText) Values ("Registration", "Registration successfully", "inscription réussie");
Insert into translations(ID, ENText, FRText) Values ("alreadyexists", "User already exists, pick another one", "l'utilisateur existe déjà, choisissez-en un autre");
Insert into translations(ID, ENText, FRText) Values ("Accesories", "Accessories", "Accessoires");
Insert into translations(ID, ENText, FRText) Values ("Basket", "Basket", "panier");
Insert into translations(ID, ENText, FRText) Values ("Orders", "Orders", "commandes");
Insert into translations(ID, ENText, FRText) Values ("email", "email", "email");
Insert into translations(ID, ENText, FRText) Values ("phonenumber", "phonenumber", "numero de télephone");




Insert into Nintendo (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values("1","Nintendo Switch","299,99 €","The Switch is brand new and it has a memory of 32 GB","Inventory:10","Nintendo Switch.jpg","Nintendo Switch","La switch est toute neuve et elle dispose d'une mémoire de 32 Go","buy","Inventaire:20","acheter");
Insert into Nintendo (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values ("2","Nintendo Switch lite","299,99 €","The Switch lite is brand new and it has a memory of 32 GB","Inventaire:20","nintendo switch lite.png","Nintendo Switch lite","La switch est toute neuve et elle dispose d'une mémoire de 32 Go","buy","Inventaire:20","acheter");


Insert into Controller (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values("1","Controller","59,99 €","The Controller is brand new, the battery lasts a long time before it runs out","Inventory:10","controller.jpeg","Controller","Le controleur est neuf, la batterie dure longtemps avant de s'épuiser","buy","Inventaire:10","acheter");
Insert into Controller (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values ("2","Joy-con","69,99 €","The Joy con is very nice if you want to play with your friends","Inventory:20","joycon.png","Joy-con;Le Joy-con est très sympa si vous voulez jouer avec vos amis","buy","Inventaire:20","acheter");


Insert into Accessories (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values("1","Charger","19,99","The Charger is brand new","Inventory:10","Charger.jpeg","Chargeur","Le Chargeur est nouveau","buy","Inventaire:10","acheter");
Insert into Accessories (Productid,ProductNameEN,Price,Description,Count,Image,ProductNameFR,DescriptionFR,buy,CountFR,buyFR) Values("2","Gamecube Adapter", "39,99"," The Gamecube Adapter allows you to connect a gamecube controller on your switch","Inventory:20","adapter.png","Adaptataeur Gamecube","L'Adaptateur Gamecube vous permet de connecter une manette gamecube a votre switch","buy","Inventaire:20","acheter");