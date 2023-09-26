CREATE DATABASE IF NOT EXISTS TheForce;

USE TheForce;

CREATE TABLE IF NOT EXISTS DarkStar (
  id INT AUTO_INCREMENT PRIMARY KEY,
  total INT,
  date_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Jedi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  total INT,
  date_time DATETIME DEFAULT CURRENT_TIMESTAMP
);