CREATE TABLE simplecms.users (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);