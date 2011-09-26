DROP TABLE tbl_user;
DROP TABLE tbl_offerings;
DROP TABLE tbl_assignments;
DROP TABLE tbl_pass;
DROP TABLE tbl_assist;
DROP TABLE tbl_matchup;

CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(10) NOT NULL,
    email VARCHAR(128) DEFAULT '',
    admin BOOLEAN DEFAULT 0
);

CREATE TABLE tbl_offerings (
	id INTEGER NOT NULL PRIMARY KEY,
	title VARCHAR(30) NOT NULL,
	room VARCHAR(3) DEFAULT '',
	hidden BOOLEAN DEFAULT 0
);

CREATE TABLE tbl_assignments (
	id INTEGER NOT NULL PRIMARY KEY,
	assignment_date DATE,
	user_id INTEGER,
	offering_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES tbl_user(id),
	FOREIGN KEY(offering_id) REFERENCES tbl_offerings(id)
);

CREATE TABLE tbl_pass (
	id INTEGER NOT NULL PRIMARY KEY,
	user_id INTEGER,
	offering_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES tbl_user(id),
	FOREIGN KEY(offering_id) REFERENCES tbl_offerings(id)
);

CREATE TABLE tbl_assist (
	id INTEGER NOT NULL PRIMARY KEY,
	user_id INTEGER,
	offering_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES tbl_user(id),
	FOREIGN KEY(offering_id) REFERENCES tbl_offerings(id)
);

CREATE TABLE tbl_matchup (
	id INTEGER NOT NULL PRIMARY KEY,
	match_date DATE,
	pass_id INTEGER,
	assist_id INTEGER,
	topic VARCHAR(250),
	FOREIGN KEY(pass_id) REFERENCES tbl_pass(id),
	FOREIGN KEY(assist_id) REFERENCES tbl_assist(id)
);

INSERT INTO tbl_offerings (title) VALUES ('ECET');
INSERT INTO tbl_offerings (title) VALUES ('CMET');
INSERT INTO tbl_offerings (title) VALUES ('AP Calculus');
INSERT INTO tbl_offerings (title) VALUES ('Honors Calculus');
INSERT INTO tbl_offerings (title) VALUES ('Pre-Calculus');
INSERT INTO tbl_offerings (title) VALUES ('Geometry');
INSERT INTO tbl_offerings (title) VALUES ('Algebra II');
INSERT INTO tbl_offerings (title) VALUES ('Discrete Math');
INSERT INTO tbl_offerings (title) VALUES ('Linear Algebra');
INSERT INTO tbl_offerings (title) VALUES ('Environmental Science');
INSERT INTO tbl_offerings (title) VALUES ('Biology');
INSERT INTO tbl_offerings (title) VALUES ('Chemistry');
INSERT INTO tbl_offerings (title) VALUES ('Physics');
INSERT INTO tbl_offerings (title, hidden) VALUES ('World History I', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('American History', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('American History II', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('Contemporary History', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('American Government', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('World Literature I', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('American Literature I', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('AP British Literature', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('American Literature II', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('Spanish', 1); --Probably not being offered

INSERT INTO tbl_offerings (title) VALUES ('Screamin Eagles');
INSERT INTO tbl_offerings (title) VALUES ('Baila Baila');
INSERT INTO tbl_offerings (title) VALUES ('Reading Roundtables');
INSERT INTO tbl_offerings (title) VALUES ('Standardized Test Prep');
INSERT INTO tbl_offerings (title, hidden) VALUES ('Accuplacer Prep', 1);
INSERT INTO tbl_offerings (title) VALUES ('Quiet Study');
INSERT INTO tbl_offerings (title, hidden) VALUES ('Quiet Study I', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('Quiet Study II', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('Quiet Study III', 1);


INSERT INTO tbl_user (username, password, salt) VALUES ('test1', '2c26542e54f5b85c1f87ff30d3689f57', 'aDlkdjIS2A');
INSERT INTO tbl_user (username, password, salt) VALUES ('test2', '81529ca5812905957bdfbe65b45cd513', 'aDlkdjIS2A');
INSERT INTO tbl_user (username, password, salt) VALUES ('test3', '625c9a700fa94536394741b65a84111f', 'aDlkdjIS2A');
