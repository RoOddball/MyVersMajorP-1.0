create database major1;
use major1;

create table if not exists user(
id int primary key auto_increment,
username varchar(50),
password varchar(50),
address varchar(50),
acctype varchar(50)
);