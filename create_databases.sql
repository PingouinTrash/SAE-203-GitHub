CREATE TABLE Bonbons (
    -- id SERIAL PRIMARY KEY,
    -- username VARCHAR(50) NOT NULL,
    -- password VARCHAR(255) NOT NULL
);

CREATE TABLE Stocks ();

CREATE TABLE Boutiques ();

CREATE TABLE Utilisateurs ();


CREATE TABLE utilisateurs (
    utilisateur_id INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    id_login VARCHAR(50),
    mdp VARCHAR(255),
    role INT
);

CREATE TABLE boutiques (
    boutique_id INT PRIMARY KEY,
    utilisateur_id INT,
    nom VARCHAR(50),
    adresse VARCHAR(255),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(utilisateur_id)
);

CREATE TABLE bonbons (
    bonbon_id INT PRIMARY KEY,
    nom VARCHAR(50),
    type VARCHAR(50),
    prix_unitaire FLOAT
);

CREATE TABLE stocks (
    stock_id INT PRIMARY KEY,
    bonbon_id INT,
    boutique_id INT,
    stock INT,
    FOREIGN KEY (bonbon_id) REFERENCES bonbons(bonbon_id),
    FOREIGN KEY (boutique_id) REFERENCES boutiques(boutique_id)
);