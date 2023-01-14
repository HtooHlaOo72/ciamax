SET SESSION FOREIGN_KEY_CHECKS=0;


/* Create Tables */

CREATE TABLE history
(
	date date NOT NULL,
	type int unsigned NOT NULL,
	memberId int NOT NULL
);


CREATE TABLE member
(
	userId int unsigned NOT NULL,
	storeID int unsigned NOT NULL,
	No_of_day int unsigned DEFAULT 30 NOT NULL,
	paid boolean DEFAULT 'false' NOT NULL,
	memberId int NOT NULL AUTO_INCREMENT,
	requestDate datetime,
	PRIMARY KEY (memberId)
);


CREATE TABLE menu
(
	menuid int unsigned NOT NULL AUTO_INCREMENT,
	menuname varchar(50) NOT NULL,
	description varchar(255) NOT NULL,
	price int unsigned NOT NULL,
	menuimage varchar(255) NOT NULL,
	storeID int unsigned NOT NULL,
	PRIMARY KEY (menuid)
);


CREATE TABLE store
(
	storeID int unsigned NOT NULL AUTO_INCREMENT,
	SName varchar(50) DEFAULT '' NOT NULL,
	StoreImage varchar(255) NOT NULL,
	userId int unsigned NOT NULL,
	QR varchar(255),
	PRIMARY KEY (storeID)
);


CREATE TABLE user
(
	userId int unsigned NOT NULL AUTO_INCREMENT,
	Name varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(255) NOT NULL,
	role int unsigned DEFAULT 1 NOT NULL,
	image varchar(255),
	PRIMARY KEY (userId)
);



/* Create Foreign Keys */

ALTER TABLE history
	ADD FOREIGN KEY (memberId)
	REFERENCES member (memberId)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE member
	ADD FOREIGN KEY (storeID)
	REFERENCES store (storeID)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE menu
	ADD FOREIGN KEY (storeID)
	REFERENCES store (storeID)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE member
	ADD FOREIGN KEY (userId)
	REFERENCES user (userId)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE store
	ADD FOREIGN KEY (userId)
	REFERENCES user (userId)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;



