CREATE DATABASE IF NOT EXISTS timecard DEFAULT CHARACTER SET utf8;
SET character_set_client=utf8;
SET character_set_connection=utf8;

USE timecard;

CREATE TABLE users
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  login_id VARCHAR(100) UNIQUE ,
  password VARCHAR(255),
  status TINYINT(1) DEFAULT 0,
  created DATETIME,
  updated DATETIME
);

CREATE TABLE times
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  start_dt DATETIME,
  end_dt DATETIME,
  created DATETIME,
  updated DATETIME
);