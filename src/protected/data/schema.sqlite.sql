CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(10) NOT NULL,
    email VARCHAR(128) NOT NULL
);

INSERT INTO tbl_user (username, password, salt, email) VALUES ('test1', '2c26542e54f5b85c1f87ff30d3689f57', 'aDlkdjIS2A', 'test1@example.com');
INSERT INTO tbl_user (username, password, salt, email) VALUES ('test2', '81529ca5812905957bdfbe65b45cd513', 'aDlkdjIS2A', 'test2@example.com');
INSERT INTO tbl_user (username, password, salt, email) VALUES ('test3', '625c9a700fa94536394741b65a84111f', 'aDlkdjIS2A', 'test3@example.com');