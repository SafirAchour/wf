CREATE DATABASE tagBeSill charset utf8 collate utf8_bin;

USE tagBeSill;

CREATE TABLE IF NOT EXISTS `Status`(
	id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description BLOB NOT NULL
) engine=InnoDB;
    
CREATE TABLE IF NOT EXISTS Project(
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

/* INSERTING VALUES TO DISPLAY SOMETHING */

INSERT INTO category(label, description) VALUES
	('Management', 'Errare Humanum est, sed perseverare diabolicum'),
	('Not Management', 'Alea iacta est'),
	('Anti-Management', 'Didjabooti');
    

INSERT INTO Status(label, description) VALUES
	('Analysis', 'Errare Humanum est, sed perseverare diabolicum'),
	('In progress', 'Alea iacta est'),
	('Blocked', 'Didjabooti'),
	('Out of budget', 'Didjabooti');
    
INSERT INTO Project(title, description, image, publishingDate, statusId) VALUES
	('wf3pm', 'Errare Humanum est, sed perseverare diabolicum', 'img/myPictures1.png', NOW(), 1),
	('wf3pm', 'boom', 'img/myPictures2.png', NOW(), 3);

INSERT INTO ProjectCategory VALUES
	(1,1),
	(2,2),
	(2,3);
    

    
