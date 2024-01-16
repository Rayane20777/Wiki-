CREATE DATABASE IF NOT EXISTS wiki;
USE wiki;



CREATE TABLE IF NOT EXISTS User(
id_user VARCHAR(50) PRIMARY KEY,
full_name VARCHAR(50),
username VARCHAR(50),
email VARCHAR(50),
password VARCHAR(500),
role VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Category(
id_category VARCHAR(50) PRIMARY KEY,
name VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Tag(
id_tag VARCHAR(50) PRIMARY KEY ,
name VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Wiki (
    id_wiki VARCHAR(50) PRIMARY KEY,
    title VARCHAR(50),
    content VARCHAR(255),
    date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    archived ENUM(0,1);
    id_user VARCHAR(50),
    id_category VARCHAR(50),
    FOREIGN KEY (id_user) REFERENCES User(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_category) REFERENCES Category(id_category) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS TagOfWiki(
id_tag VARCHAR(50) ,
id_wiki VARCHAR(50),
FOREIGN KEY (id_tag) REFERENCES Tag(id_tag) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (id_wiki) REFERENCES Wiki(id_wiki) ON DELETE CASCADE ON UPDATE CASCADE
);
