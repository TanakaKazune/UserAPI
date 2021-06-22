drop database if exists User_data;
create database User_data default character set utf8 collate utf8_general_ci;
grant all on User_data.* to 'staff'@'localhost' identified by 'password';
use User_data;

create table user_information (
	user_id int auto_increment primary key, 
	name varchar(100) not null, 
	age int not null
);
