CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(10) NOT NULL,
    email VARCHAR(128) NOT NULL,
    admin BOOLEAN DEFAULT 0
);

CREATE TABLE tbl_offerings (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(40) NOT NULL,
	room VARCHAR(3) DEFAULT '',
	hidden BOOLEAN DEFAULT 0
);

CREATE TABLE tbl_assignments (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	assignment_date INTEGER(12),
	user_id INTEGER,
	offering_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES tbl_user(id),
	FOREIGN KEY(offering_id) REFERENCES tbl_offerings(id)
);

CREATE TABLE tbl_pass (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INTEGER,
	offering_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES tbl_user(id),
	FOREIGN KEY(offering_id) REFERENCES tbl_offerings(id)
);

CREATE TABLE tbl_assist (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INTEGER,
	offering_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES tbl_user(id),
	FOREIGN KEY(offering_id) REFERENCES tbl_offerings(id)
);

CREATE TABLE tbl_matchup (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	match_date DATE,
	pass_id INTEGER,
	assist_id INTEGER,
	topic VARCHAR(250),
	FOREIGN KEY(pass_id) REFERENCES tbl_pass(id),
	FOREIGN KEY(assist_id) REFERENCES tbl_assist(id)
);

CREATE TABLE tbl_passwordResetRequests (
	id INTEGER NOT NULL PRIMARY KEY,
	user_id INTEGER,
	new_password VARCHAR(128) NOT NULL,
	creation_time INTEGER,
	reset_code VARCHAR(15)
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

INSERT INTO tbl_offerings (title) VALUES ('Screamin Eagles Vocal Ensemble');
INSERT INTO tbl_offerings (title) VALUES ('Baila Baila');
INSERT INTO tbl_offerings (title) VALUES ('Reading Roundtables');
INSERT INTO tbl_offerings (title) VALUES ('Standardized Test Prep');
INSERT INTO tbl_offerings (title, hidden) VALUES ('Accuplacer Prep', 1);
INSERT INTO tbl_offerings (title) VALUES ('Quiet Study');
INSERT INTO tbl_offerings (title, hidden) VALUES ('Quiet Study I', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('Quiet Study II', 1);
INSERT INTO tbl_offerings (title, hidden) VALUES ('Quiet Study III', 1);

INSERT INTO tbl_user (username, password, salt, email) VALUES ('test1', md5('aDlkdjIS2A'+'pass1'), 'aDlkdjIS2A', 'test1@example.com');
INSERT INTO tbl_user (username, password, salt, email) VALUES ('test2', md5('aDlkdjIS2A'+'pass2'), 'aDlkdjIS2A', 'test2@example.com');
INSERT INTO tbl_user (username, password, salt, email) VALUES ('test3', md5('aDlkdjIS2A'+'pass3'), 'aDlkdjIS2A', 'test3@example.com');
