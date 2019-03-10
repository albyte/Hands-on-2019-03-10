CREATE DATABASE IF NOT EXISTS timecard DEFAULT CHARACTER SET utf8;
SET character_set_client=utf8;
SET character_set_connection=utf8;

USE timecard;

CREATE TABLE users
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  login_id VARCHAR(100) UNIQUE COMMENT 'ログインID',
  password VARCHAR(255) COMMENT 'パスワード',
  name VARCHAR(100) COMMENT '名前',
  status TINYINT(1) DEFAULT 0 COMMENT '状態',
  created DATETIME COMMENT '作成日時',
  updated DATETIME COMMENT '更新日時'
) COMMENT 'アカウントテーブル';

CREATE TABLE times
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT COMMENT 'ユーザID',
  target_dt DATE COMMENT '対象日',
  start_dt DATETIME COMMENT '出勤日時',
  end_dt DATETIME COMMENT '退勤日時',
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '作成日時',
  updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時'
) COMMENT 'タイムカードテーブル';