CREATE TABLE if not exists user (
id int( 11 ) NOT NULL AUTO_INCREMENT ,
name varchar( 30 ) NOT NULL ,
email varchar( 50 ) NOT NULL ,
password varchar( 128 ) NOT NULL ,
school_id int( 11 ) ,
admin boolean DEFAULT False ,
PRIMARY KEY ( id ) ,
UNIQUE KEY id ( id ),
UNIQUE KEY email ( email ) );

CREATE TABLE if not exists post (
id int( 11 ) NOT NULL AUTO_INCREMENT ,
user_id int( 11 ) NOT NULL, 
class_id int( 11 ) NOT NULL,
title varchar( 30 ) NOT NULL ,
content TEXT NOT NULL ,
votes int( 11 ) ,
date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY ( id ) ,
UNIQUE KEY id ( id ) );

CREATE TABLE if not exists school (
id int( 11 ) NOT NULL AUTO_INCREMENT ,
name varchar( 30 ) NOT NULL ,
PRIMARY KEY ( id ) ,
UNIQUE KEY id ( id ) );

CREATE TABLE if not exists class (
id int( 11 ) NOT NULL AUTO_INCREMENT ,
school_id int( 11 ) NOT NULL,
name varchar( 50 ) NOT NULL ,
department_code varchar( 10 ),
class_code int( 5 ),
PRIMARY KEY ( id ) ,
UNIQUE KEY id ( id ) );

CREATE TABLE if not exists comment (
id int( 11 ) NOT NULL AUTO_INCREMENT ,
post_id int( 11 ) NOT NULL, 
user_id int( 11 ) NOT NULL,
content TEXT NOT NULL ,
PRIMARY KEY ( id ) ,
UNIQUE KEY id ( id ) );

CREATE TABLE if not exists vote (
id int( 11 ) NOT NULL AUTO_INCREMENT ,
link_id int( 11 ) NOT NULL, 
user_id int( 11 ) NOT NULL, 
PRIMARY KEY ( id ) ,
UNIQUE KEY id ( id ) );

CREATE TABLE if not exists linker (
user_id int( 11 ) NOT NULL, 
class_id int( 11 ) NOT NULL );
