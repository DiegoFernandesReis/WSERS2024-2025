drop database if exists WSERS2FORUM;
create database WSERS2FORUM;
use WSERS2FORUM;

create tables users (
    id int auto_increment primary key,
    username varchar(50) unique not null,
    password varchar(255) not null
);

create table messages (
    id int auto_increment primary key,
    user_id int not null,
    content text not null,
    created_at timestamp default current_timestamp,
    foreign key (user_id) references users(id)
);
