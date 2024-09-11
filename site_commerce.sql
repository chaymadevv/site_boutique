CREATE TABLE membre (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(30) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    civilite ENUM('Mr', 'Mme', 'Non-binaire') NOT NULL,
    ville VARCHAR(255) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    adresse TEXT NOT NULL,
    statut ENUM('admin', 'client') NOT NULL DEFAULT 'client'
);

CREATE TABLE produit (
    id INT PRIMARY KEY AUTO_INCREMENT,
    reference VARCHAR(50) NOT NULL UNIQUE,
    categorie VARCHAR(100) NOT NULL,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    couleur VARCHAR(50),
    taille VARCHAR(10),
    public ENUM('homme', 'femme', 'enfant', 'mixte') NOT NULL,
    photo VARCHAR(255),
    prix DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

CREATE TABLE commande (
    id INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10, 2) NOT NULL,
    date_enregistrement DATETIME NOT NULL,
    etat ENUM('en préparation', 'expédiée', 'livrée', 'annulée') NOT NULL,
    id_membre INT NOT NULL,
    FOREIGN KEY (id_membre) REFERENCES membre(id) ON DELETE CASCADE
);

CREATE TABLE details_commande (
    id INT PRIMARY KEY AUTO_INCREMENT,
    quantite INT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    id_commande INT NOT NULL,
    id_produit INT NOT NULL,
    FOREIGN KEY (id_commande) REFERENCES commande(id) ON DELETE CASCADE,
    FOREIGN KEY (id_produit) REFERENCES produit(id) ON DELETE CASCADE
);
