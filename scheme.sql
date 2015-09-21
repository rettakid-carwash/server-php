SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";

CREATE DATABASE PACS;

USE PACS;

CREATE TABLE PACS_USER (
	USER_ID 			BIGINT(15)		 	NOT NULL AUTO_INCREMENT,
	USER_EMAIL 			VARCHAR(50) 		NOT NULL,
	USER_PASSWORD 		VARCHAR(20) 		NOT NULL,
	USER_NAME 			VARCHAR(20)			NULL,
	USER_SURNAME 		VARCHAR(20)			NULL,
	USER_NUMBER 		VARCHAR(15) 		NULL,
	USER_GENDER 		VARCHAR(9)			NULL,
	USER_AGE 			INT(4)				NULL,
	USER_ALLOW_PUSH 	BOOLEAN 			NOT NULL,

	PRIMARY KEY (USER_ID),
	UNIQUE KEY USER_ID(USER_ID),
	UNIQUE KEY USER_EMAIL(USER_EMAIL)
);

CREATE TABLE PACS_DEVICES_TYPE (
	DEVICES_TYPE_ID		BIGINT(15)	 	NOT NULL  AUTO_INCREMENT,
	DEVICE_TYPE_NAME	VARCHAR(50) 	NOT NULL,
	DEVICE_CAN_PUSH 	BOOLEAN 		NOT NULL,
	
	PRIMARY KEY (DEVICES_TYPE_ID),
	UNIQUE KEY DEVICES_TYPE_ID(DEVICES_TYPE_ID)
);

CREATE TABLE PACS_USER_DEVICE (
	USER_DEVICES_ID		BIGINT(15) 		NOT NULL AUTO_INCREMENT,
	DEVICE_USER_ID		BIGINT(15) 		NOT NULL,
	DEVICE_TYPE_ID 		BIGINT(15) 		NOT NULL,
	DEVICE_NAME			VARCHAR(50) 	NOT NULL,
	DEVICE_ID 			VARCHAR(50) 	NOT NULL,
	
	PRIMARY KEY (USER_DEVICES_ID),
	UNIQUE KEY USER_DEVICES_ID(USER_DEVICES_ID),
	FOREIGN KEY (DEVICE_USER_ID) REFERENCES PACS_USER(USER_ID),
	FOREIGN KEY (DEVICE_TYPE_ID) REFERENCES PACS_DEVICES_TYPE(DEVICES_TYPE_ID)
);

CREATE TABLE PACS_USER_CAR (
	CAR_ID			BIGINT(15)	 	NOT NULL AUTO_INCREMENT,
	CAR_USER_ID		BIGINT(15) 		NOT NULL,
	CAR_NAME		VARCHAR(50) 	NOT NULL,
	CAR_NUM_PLATE 	VARCHAR(50) 	NULL,
	CAR_MAKE 		VARCHAR(50) 	NULL,
	CAR_MODEL 		VARCHAR(50) 	NULL,
	CAR_YEAR 		VARCHAR(50) 	NULL,
	CAR_COLOR 		VARCHAR(10) 	NULL,
	
	PRIMARY KEY (CAR_ID),
	UNIQUE KEY CAR_ID(CAR_ID),
	UNIQUE KEY CAR_NUM_PLATE(CAR_NUM_PLATE),
	FOREIGN KEY (CAR_USER_ID) REFERENCES PACS_USER(USER_ID)
);

CREATE TABLE PACS_DATA_CONTENT (
	DATA_CONTENT_ID 	BIGINT(15)		 	NOT NULL AUTO_INCREMENT,
	DATA_CONTENT_DATA 	BLOB		 		NOT NULL,

	PRIMARY KEY (DATA_CONTENT_ID),
	UNIQUE KEY DATA_CONTENT_ID(DATA_CONTENT_ID)
);

CREATE TABLE PACS_ICON (
	ICON_ID 			BIGINT(15)		 	NOT NULL AUTO_INCREMENT,
	ICON_NAME 			VARCHAR(10)		 	NOT NULL,
	ICON_COLOR 			VARCHAR(10)		 	NOT NULL,
	ICON_SIZE 			INT(9)		 		NOT NULL,
	ICON_FILE_NAME 		VARCHAR(50)		 	NOT NULL,

	PRIMARY KEY (ICON_ID),
	UNIQUE KEY ICON_ID(ICON_ID)
);

CREATE TABLE PACS_NEWS (
	NEWS_ID 			BIGINT(15)		 	NOT NULL AUTO_INCREMENT,
	NEWS_HEADING 		VARCHAR(50) 		NOT NULL,
	NEWS_BODY 			BIGINT(15) 			NOT NULL,
	NEWS_DATE 			DATETIME 			NOT NULL,

	PRIMARY KEY (NEWS_ID),
	UNIQUE KEY NEWS_ID(NEWS_ID),
	FOREIGN KEY (NEWS_BODY) REFERENCES PACS_DATA_CONTENT(DATA_CONTENT_ID)
);

CREATE TABLE PACS_SERVICE (
	SERVICE_ID 					BIGINT(15) 		NOT NULL AUTO_INCREMENT,
	SERVICE_AMOUNT 				FLOAT(10) 		NOT NULL,
	SERVICE_LOYALTY_POINTS 		INT(9) 			NOT NULL,
	SERVICE_NAME 				VARCHAR(10) 	NOT NULL,
	SERVICE_DESCR				VARCHAR(100) 	NOT NULL,
	SERVICE_ICON				BIGINT(15)		NOT NULL,
	EFF_FROM					DATETIME 		NOT NULL,
	EFF_TO						DATETIME 		NOT NULL,

	PRIMARY KEY (SERVICE_ID),
	UNIQUE KEY SERVICE_ID(SERVICE_ID),
	FOREIGN KEY (SERVICE_ICON) REFERENCES PACS_ICON(ICON_ID)
);

CREATE TABLE PACS_TRANSACTION_PROOF (
	TRANSACTION_PROOF_ID 	BIGINT(15) 		NOT NULL AUTO_INCREMENT,
	TRANSACTION_PROOF_URL 	VARCHAR(50)		NOT NULL,
	TRANSACTION_PROOF_FILE	VARCHAR(50) 	NOT NULL,

	PRIMARY KEY (TRANSACTION_PROOF_ID),
	UNIQUE KEY TRANSACTION_PROOF_ID(TRANSACTION_PROOF_ID)
);

CREATE TABLE PACS_TRANSACTION (
	TRANSACTION_ID 			BIGINT(15) 		NOT NULL AUTO_INCREMENT,
	TRANSACTION_DATE 		DATETIME 		NOT NULL,
	TRANSACTION_TOTAL 		FLOAT(10) 		NOT NULL,
	TRANSACTION_USER_ID		BIGINT(15) 		NOT NULL,
	TRANSACTION_TYPE		VARCHAR(50) 	NOT NULL,
	TRANSACTION_PROOF_ID	BIGINT(15)		NULL,

	PRIMARY KEY (TRANSACTION_ID),
	UNIQUE KEY TRANSACTION_ID(TRANSACTION_ID),
	FOREIGN KEY (TRANSACTION_PROOF_ID) REFERENCES PACS_TRANSACTION_PROOF(TRANSACTION_PROOF_ID),
	FOREIGN KEY (TRANSACTION_USER_ID) REFERENCES PACS_USER(USER_ID)
);

CREATE TABLE PACS_TRANSACTION_SERVICE (
	TRANSACTION_SERVICE_ID 		BIGINT(15) 		NOT NULL AUTO_INCREMENT,
	TRANSACTION_ID 				BIGINT(15)		NOT NULL,
	SERVICE_ID 					BIGINT(15) 		NOT NULL,

	PRIMARY KEY (TRANSACTION_SERVICE_ID),
	UNIQUE KEY TRANSACTION_SERVICE_ID(TRANSACTION_SERVICE_ID),
	FOREIGN KEY (TRANSACTION_ID) REFERENCES PACS_TRANSACTION(TRANSACTION_ID),
	FOREIGN KEY (SERVICE_ID) REFERENCES PACS_SERVICE(SERVICE_ID)
);

CREATE TABLE PACS_SESSION (
	SESSION_ID 			BIGINT(15) 		NOT NULL AUTO_INCREMENT,
	SESSION_USER_ID 	BIGINT(15) 		NOT NULL,
	SESSION_LOCATION 	VARCHAR(50) 	NULL,
	EFF_FROM			DATETIME 		NOT NULL,
	EFF_TO				DATETIME 		NOT NULL,

	PRIMARY KEY (SESSION_ID),
	UNIQUE KEY SESSION_ID(SESSION_ID),
	FOREIGN KEY (SESSION_USER_ID) REFERENCES PACS_USER(USER_ID)
);

CREATE TABLE PACS_SESSION_SERVICE (
	SESSION_SERVICE_ID 		BIGINT(15) 	NOT NULL AUTO_INCREMENT,
	SESSION_ID 				BIGINT(15) 	NOT NULL,
	SERVICE_ID				BIGINT(15) 	NOT NULL,

	PRIMARY KEY (SESSION_SERVICE_ID),
	UNIQUE KEY SESSION_SERVICE_ID(SESSION_SERVICE_ID),
	FOREIGN KEY (SESSION_ID) REFERENCES PACS_SESSION(SESSION_ID),
	FOREIGN KEY (SERVICE_ID) REFERENCES PACS_SERVICE(SERVICE_ID)
);

CREATE TABLE PACS_LOYALTY_REWARD (
	REWARDS_ID 			BIGINT(15) 		NOT NULL AUTO_INCREMENT,
	REWARDS_NAME 		VARCHAR(50) 	NOT NULL,
	REWARDS_DESCR 		VARCHAR(50) 	NOT NULL,
	REWARDS_AMOUNT 		BIGINT(15) 		NOT NULL,
	EFF_FROM			DATETIME 		NOT NULL,
	EFF_TO				DATETIME 		NOT NULL,

	PRIMARY KEY (REWARDS_ID),
	UNIQUE KEY REWARDS_ID(REWARDS_ID)
);