CREATE DATABASE tagBeSill charset utf8 collate utf8_bin;

USE tagBeSill;

CREATE TABLE IF NOT EXISTS `Status`(
	id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description BLOB NOT NULL
) engine=InnoDB;
    
CREATE TABLE IF NOT EXISTS Project (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description BLOB NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    publishingDate DATETIME DEFAULT NULL,
    creationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    statusid INT UNSIGNED NOT NULL, FOREIGN KEY(StatusId) REFERENCES Status(id)
) engine=InnoDB;
    
CREATE TABLE IF NOT EXISTS Category(
	id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description BLOB NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ProjectCategory(
	projectId INT UNSIGNED,
    categoryId INT UNSIGNED,
    PRIMARY KEY (projectId, categoryId), 
    FOREIGN KEY (projectId) REFERENCES Project(id),
    FOREIGN KEY (categoryId) REFERENCES Category(id)
) ENGINE=InnoDB;


    
    
