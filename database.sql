CREATE DATABASE university_management;

USE university_management;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    birth_date DATE NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_card_front LONGBLOB NOT NULL,
    id_card_back LONGBLOB NOT NULL
);
