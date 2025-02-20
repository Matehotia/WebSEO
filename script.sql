CREATE DATABASE IF NOT EXISTS `test`;
\C test;

create table articles(
    id serial,
    title varchar(255),
    content text,
    url varchar(255),
);