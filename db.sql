CREATE DATABASE bibliotheque;
USE bibliotheque;

CREATE TABLE livres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    auteur VARCHAR(100) NOT NULL,
    annee_publication INT,
    genre VARCHAR(50)
);
