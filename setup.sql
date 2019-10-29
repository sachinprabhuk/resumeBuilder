drop database resumeapp;

create database resumeapp;

use resumeapp;

create table user_auth(
    email varchar(50) primary key,
    password varchar(50)
);

insert into user_auth values("hey@gmail.com", "hey");
insert into user_auth values("hey1@gmail.com", "hey");

create table personal(
    email varchar(50),
    fname varchar(50),
    lname varchar(50),
    description varchar(255),
    contact varchar(12),
    foreign key(email) references user_auth(email)
);

create table education(
    email varchar(50),
    institution varchar(100),
    description varchar(200),
    s_date varchar(10),
    e_date varchar(10),
    foreign key(email) references user_auth(email)
);

create table projects(
    email varchar(50),
    title varchar(50),
    description varchar(200),
    foreign key(email) references user_auth(email)
);

create table achivement(
    email varchar(50),
    title varchar(50),
    description varchar(200),
    foreign key(email) references user_auth(email)
);

create table experience(
    email varchar(50),
    title varchar(50),
    description varchar(200),
    foreign key(email) references user_auth(email)
);