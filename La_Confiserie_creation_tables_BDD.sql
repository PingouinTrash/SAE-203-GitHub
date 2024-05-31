CREATE TABLE utilisateurs (
    utilisateur_id INT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    id_login VARCHAR(50),
    mdp VARCHAR(255),
    role INT
    PRIMARY KEY (utilisateur_id)
);

CREATE TABLE boutiques (
    boutique_id INT,
    utilisateur_id INT,
    nom VARCHAR(50),
    rue VARCHAR(50),
    num_rue FLOAT,
    code_postal FLOAT,
    ville VARCHAR(50),
    PRIMARY KEY (boutique_id)
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(utilisateur_id)
);

CREATE TABLE bonbons (
    bonbon_id INT,
    nom VARCHAR(50),
    type VARCHAR(50),
    PRIMARY KEY (bonbon_id)
    prix_unitaire FLOAT
);

CREATE TABLE stocks (
    stock_id INT ,
    bonbon_id INT,
    boutique_id INT,
    stock INT,
    PRIMARY KEY (stock_id)
    FOREIGN KEY (bonbon_id) REFERENCES bonbons(bonbon_id),
    FOREIGN KEY (boutique_id) REFERENCES boutiques(boutique_id)
);