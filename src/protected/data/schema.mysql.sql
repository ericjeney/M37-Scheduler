CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(10) NOT NULL,
    email VARCHAR(128) NOT NULL
);

INSERT INTO tbl_user (username, password, salt, email) VALUES ('test1', md5('aDlkdjIS2A'+'pass1'), 'aDlkdjIS2A', 'test1@example.com');
INSERT INTO tbl_user (username, password, salt, email) VALUES ('test2', md5('aDlkdjIS2A'+'pass2'), 'aDlkdjIS2A', 'test2@example.com');
INSERT INTO tbl_user (username, password, salt, email) VALUES ('test3', md5('aDlkdjIS2A'+'pass3'), 'aDlkdjIS2A', 'test3@example.com');