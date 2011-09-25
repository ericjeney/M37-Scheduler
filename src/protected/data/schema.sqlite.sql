DROP TABLE tbl_user;

CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(10) NOT NULL,
    email VARCHAR(128) DEFAULT ''
);

INSERT INTO tbl_user (username, password, salt) VALUES ('test1', '2c26542e54f5b85c1f87ff30d3689f57', 'aDlkdjIS2A');
INSERT INTO tbl_user (username, password, salt) VALUES ('test2', '81529ca5812905957bdfbe65b45cd513', 'aDlkdjIS2A');
INSERT INTO tbl_user (username, password, salt) VALUES ('test3', '625c9a700fa94536394741b65a84111f', 'aDlkdjIS2A');