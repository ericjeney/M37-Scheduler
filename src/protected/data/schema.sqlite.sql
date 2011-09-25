DROP TABLE tbl_user;

CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(10) NOT NULL,
    email VARCHAR(128) DEFAULT ''
);

CREATE TABLE tbl_options (
	id INTEGER NOT NULL PRIMARY KEY,
	title VARCHAR(30) NOT NULL,
	room VARCHAR(3) DEFAULT ''
);

INSERT INTO tbl_options (title) VALUES ('ECET');	
INSERT INTO tbl_options (title) VALUES ('CMET');
INSERT INTO tbl_options (title) VALUES ('AP Calculus');
INSERT INTO tbl_options (title) VALUES ('Honors Calculus');
INSERT INTO tbl_options (title) VALUES ('Pre Calculus');
INSERT INTO tbl_options (title) VALUES ('Geometry');
INSERT INTO tbl_options (title) VALUES ('Algebra II');
INSERT INTO tbl_options (title) VALUES ('Discrete Math');
INSERT INTO tbl_options (title) VALUES ('Linear Algebra');
INSERT INTO tbl_options (title) VALUES ('Environmental Science');
INSERT INTO tbl_options (title) VALUES ('Biology');
INSERT INTO tbl_options (title) VALUES ('Chemistry');
INSERT INTO tbl_options (title) VALUES ('Physics');
INSERT INTO tbl_options (title) VALUES ('World History I'); 
INSERT INTO tbl_options (title) VALUES ('American History');
INSERT INTO tbl_options (title) VALUES ('American History II');
INSERT INTO tbl_options (title) VALUES ('Contemporary History');
INSERT INTO tbl_options (title) VALUES ('American Government');
INSERT INTO tbl_options (title) VALUES ('World Literature I');
INSERT INTO tbl_options (title) VALUES ('American Literature I');
INSERT INTO tbl_options (title) VALUES ('AP British Literature');
INSERT INTO tbl_options (title) VALUES ('American Literature II');
INSERT INTO tbl_options (title) VALUES ('Spanish'); --Probably not being offered

INSERT INTO tbl_options (title) VALUES ('Screamin Eagles');
INSERT INTO tbl_options (title) VALUES ('Baila Baila');
INSERT INTO tbl_options (title) VALUES ('Reading Roundtables'); 
INSERT INTO tbl_options (title) VALUES ('Standardized Test Prep');
INSERT INTO tbl_options (title) VALUES ('Accuplacer Prep');
INSERT INTO tbl_options (title) VALUES ('Quiet Study I');
INSERT INTO tbl_options (title) VALUES ('Quiet Study II');
INSERT INTO tbl_options (title) VALUES ('Quiet Study III');


INSERT INTO tbl_user (username, password, salt) VALUES ('test1', '2c26542e54f5b85c1f87ff30d3689f57', 'aDlkdjIS2A');
INSERT INTO tbl_user (username, password, salt) VALUES ('test2', '81529ca5812905957bdfbe65b45cd513', 'aDlkdjIS2A');
INSERT INTO tbl_user (username, password, salt) VALUES ('test3', '625c9a700fa94536394741b65a84111f', 'aDlkdjIS2A');