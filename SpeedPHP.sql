create table job(
    id int not null auto_increment primary key,
	url varchar(200) not null,
    title varchar(200) not null,	
    content varchar(500) not null,
	pubtime varchar(200) not null,
	encryption varchar(100) not null，
	source varchar(100) not null
);

create table hole(
    id int not null auto_increment primary key,
	url varchar(200) not null,
    title varchar(200) not null,	
    content varchar(500) not null,
	pubtime varchar(200) not null,
	encryption varchar(100) not null
);

create table tech(
    id int not null auto_increment primary key,
	url varchar(200) not null,
    title varchar(200) not null,	
    content varchar(500) not null,
	pubtime varchar(200) not null,
	encryption varchar(100) not null
);


create table news(
    id int not null auto_increment primary key,
	url varchar(200) not null,
    title varchar(200) not null,	
    content varchar(500) not null,
	pubtime varchar(200) not null,
	encryption varchar(100) not null
);


create table _admin(
    id int not null auto_increment primary key,
	username varchar(200) not null,
    passwd varchar(200) not null
);
insert into _admin(username,passwd) values('admin',md5('admin'));
create table users(
    id int not null auto_increment primary key,
	email varchar(200) not null,	
    content varchar(500) not null,
	times varchar(200) not null
);

insert into users(email,content,times) values('965948592@qq.com','job,news','two');
insert into users(email,content,times) values('1468694848@qq.com','job,news,hole','three');