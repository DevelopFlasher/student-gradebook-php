drop database if exists db;
create database db;
use db;

drop table if exists users;
create table users (
    `ID` int primary key auto_increment not null,
    `login` varchar(50),
    `name` varchar(50),
    `password` varchar(256)
);
insert into users (`login`, `name`, `password`) values ("student_demo", "Student Demo", "123");
insert into users (`login`, `name`, `password`) values ("teacher_demo", "Teacher Demo", "321");


drop table if exists Subjects;
create table Subjects (
    `Subject_ID` int primary key auto_increment,
    `Subject_name` varchar(50)
);
insert into Subjects (`Subject_name`) values ("Math");
insert into Subjects (`Subject_name`) values ("Russian");
insert into Subjects (`Subject_name`) values ("English");
insert into Subjects (`Subject_name`) values ("History");
insert into Subjects (`Subject_name`) values ("Biology");



drop table if exists Marks;
create table Marks (
    `ID_Subject` int,
    `ID_Student` int,
    `mark` int,
    foreign key (`ID_Subject`) references `Subjects`(`Subject_ID`),
    foreign key (`ID_Student`) references `users`(`ID`)
);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (1, 1, 5);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (2, 1, 4);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (3, 1, 5);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (4, 1, 3);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (5, 1, 4);

insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (1, 2, 3);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (2, 2, 3);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (3, 2, 5);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (4, 2, 4);
insert into Marks (`ID_Subject`, `ID_Student`, `mark`) values (5, 2, 5);


drop table if exists Teachers;
create table Teachers (
    `ID_teacher_subject` int,
    `Name` varchar(50),
    foreign key (`ID_teacher_subject`) references `Subjects`(`Subject_ID`)
);
insert into Teachers (`ID_teacher_subject`, `Name`) values (1, "Pyshkin");
insert into Teachers (`ID_teacher_subject`, `Name`) values (2, "Elcin");
insert into Teachers (`ID_teacher_subject`, `Name`) values (3, "Putin");
insert into Teachers (`ID_teacher_subject`, `Name`) values (4, "Stalin");
insert into Teachers (`ID_teacher_subject`, `Name`) values (5, "Kydj");
