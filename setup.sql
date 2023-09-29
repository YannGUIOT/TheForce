CREATE DATABASE IF NOT EXISTS TheForce;

USE TheForce;

CREATE TABLE IF NOT EXISTS DarkSide (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_time DATETIME DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS Jedi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_time DATETIME DEFAULT NOW()
);